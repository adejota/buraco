<?php

namespace Tests\Feature;

use App\Models\Match;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MatchTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function a_list_of_matches_can_be_fetched_for_the_authenticated_user()
    {        
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $match = App\Models\Match::factory()->create(['user_id' => $user->id]);
        $anotherMatch = Match::factory()->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/matches?api_token=' . $user->api_token);

        $response->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    [
                        "data" => [
                            'id' => $match->id,
                        ],
                    ],
                ],
            ]);
    }

    /** @test */
    public function an_unauthenticated_user_should_redirect_to_login()
    {
        $data = $this->data();

        $response = $this->post('/api/matches', array_merge($data, ['api_token' => '']));

        $response->assertRedirect('/login');
        $this->assertCount(0, Match::all());
    }

    /** @test */
    public function an_authenticated_user_can_add_a_match()
    {        
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();

        $data = $this->data();

        $response = $this->post('/api/matches', $data);

        $match = Match::first();

        $this->assertEquals( 1, $match->opponent_id);
        $this->assertEquals( 3000, $match->max_points);
        $this->assertEquals( 80, $match->time_limit);
        $this->assertEquals( 30, $match->current_time);
        $this->assertEquals( 1, $match->current_round);
        $this->assertEquals( 3000, $match->total_score);
        $this->assertEquals( 3000, $match->opponent_total_score);
        $this->assertEquals( 'v', $match->result);

        $response->assertStatus(Response::HTTP_CREATED);
            // o symfony do laravel possui uma classe que permite alterar o número do status por seu nome

        $response->assertJson([
            'data' => [
                'id' => $match->id,
            ],
            'links' => [
                'self' => $match->path(),
            ],
        ]);
    }

    /** @test */
    public function fields_are_required()
    {
        collect( ['opponent_id', 'max_points'] )
            ->each(function($field) {
                $data = array_merge($this->data(), [$field => '']);

                $response = $this->post('/api/matches', $data);
                
                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Match::all());
            });

    }

    /** @test */
    public function a_match_can_be_retrieved()
    {        
        $match = Match::factory()->create( ['user_id' => $this->user->id]);

        $response = $this->get('/api/matches/' . $match->id . '?api_token=' . $this->user->api_token);

        /* dd($response->getContent()); */

        // assertJsonFragment
        $response->assertJson([
            'data' => [
                'id' => $match->id,
                'user_id' => $match->user_id,
                'opponent_id' => $match->opponent_id,
                'max_points' => $match->max_points,
                'time_limit' => $match->time_limit,
                'current_time' => $match->current_time,
                'current_round' => $match->current_round,
                'total_score' => $match->total_score,
                'opponent_total_score' => $match->opponent_total_score,
                'result' => $match->result,
                'last_updated' => $match->updated_at->diffForHumans(),
            ]            
        ]);
    }

    /** @test */
    public function only_the_users_matches_can_be_retrieved()
    {
        $match = Match::factory()->create( ['user_id' => $this->user->id]);

        $anotherUser = User::factory()->create();

        $response = $this->get('/api/matches/' . $match->id . '?api_token=' . $anotherUser->api_token);

        $response->assertStatus(403);
        // 404 => not found
        // 403 => forbidden -> mais usado em APIs
        // 401 => unauthorized
    }

    /** @test */
    public function a_match_can_be_patched()
    {
        $match = Match::factory()->create( ['user_id' => $this->user->id] );
        // match foi armazenado na memória com esse valor

        $response = $this->patch('/api/matches/' . $match->id, $this->data());

        $match = $match->fresh();
        // precisamos atualizar porque o match que queremos n é o mesmo que foi passado inicialmente, ele foi updated

        $this->assertEquals( 1, $match->opponent_id);
        $this->assertEquals( 3000, $match->max_points);
        $this->assertEquals( 80, $match->time_limit);
        $this->assertEquals( 30, $match->current_time);
        $this->assertEquals( 1, $match->current_round);
        $this->assertEquals( 3000, $match->total_score);
        $this->assertEquals( 3000, $match->opponent_total_score);
        $this->assertEquals( 'v', $match->result);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'data' => [
                'id' => $match->id,
            ],
            'links' => [
                'self' => $match->path(),
            ]
        ]);
    }

    /** @test */
    public function only_the_owner_of_the_match_can_patch_the_match()
    {
        $match = Match::factory()->create();

        $anotherUser = User::factory()->create();

        $response = $this->patch('/api/matches/' . $match->id, array_merge($this->data(), ['api_token' => $anotherUser->api_token]));

        $response->assertStatus(403);
    }

    /** @test */
    public function a_match_can_be_deleted()
    {
        $match = Match::factory()->create( ['user_id' => $this->user->id] );

        $response = $this->delete('/api/matches/' . $match->id, ['api_token' => $this->user->api_token]);

        $this->assertCount(0, Match::all());

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function only_the_owner_can_delete_the_match()
    {
        $match = Match::factory()->create();

        $anotherUser = User::factory()->create();

        $response = $this->delete('/api/matches/' . $match->id, ['api_token' => $this->user->api_token]);

        $response->assertStatus(403);
    }

    private function data()
    {
        return [
            'opponent_id' => 1,
            'max_points' => 3000,
            'time_limit' => 80,
            'current_time' => 30,
            'current_round' => 1,
            'total_score' => 3000,
            'opponent_total_score' => 3000,
            'result' => 'v',
            'api_token' => $this->user->api_token,
        ];
    }
}
