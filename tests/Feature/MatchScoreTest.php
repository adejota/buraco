<?php

namespace Tests\Feature;

use App\Models\MatchScore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MatchScoreTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function a_list_of_match_scores_can_be_fetched_for_the_authenticated_user()
    {               
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $matchscore = MatchScore::factory()->create(['user_id' => $user->id]);
        $anotherMatchscore = MatchScore::factory()->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/matchscores?api_token=' . $user->api_token);

        $response->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    [
                        "data" => [
                            'id' => $matchscore->id,
                        ],
                    ],
                ],
            ]);
    }

    /** @test */
    public function an_unauthenticated_user_should_redirect_to_login()
    {
        $data = $this->data();

        $response = $this->post('/api/matchscores', array_merge($data, ['api_token' => '']));

        $response->assertRedirect('/login');
        $this->assertCount(0, MatchScore::all());
    }

    /** @test */
    public function an_authenticated_user_can_add_an_match_score()
    {        
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();

        $data = $this->data();

        $response = $this->post('/api/matchscores', $data);

        $matchscore = MatchScore::first();

        $this->assertEquals(1, $matchscore->match_id);
        $this->assertEquals(1, $matchscore->round);
        $this->assertEquals(30, $matchscore->time);
        $this->assertEquals(1200, $matchscore->round_total_score);
        $this->assertEquals(-100, $matchscore->negative_score);
        $this->assertEquals(600, $matchscore->additional_score);
        $this->assertEquals(300, $matchscore->cards_score);
        $this->assertEquals(1200, $matchscore->opponent_score);
        $this->assertEquals('no', $matchscore->pot);
        $this->assertEquals('no', $matchscore->got);

        $response->assertStatus(Response::HTTP_CREATED);
            // o symfony do laravel possui uma classe que permite alterar o número do status por seu nome

        $response->assertJson([
            'data' => [
                'id' => $matchscore->id,
            ],
            'links' => [
                'self' => $matchscore->path(),
            ],
        ]);
    }

    /** @test */
    public function fields_are_required()
    {
        collect( ['match_id', 'round', 'additional_score', 'cards_score', 'opponent_score'] )
            ->each(function($field) {
                $data = array_merge($this->data(), [$field => '']);

                $response = $this->post('/api/matchscores', $data);
                
                $response->assertSessionHasErrors($field);
                $this->assertCount(0, MatchScore::all());
            });
    }

    /** @test */
    public function a_match_score_can_be_retrieved()
    {
        $matchscore = MatchScore::factory()->create( ['user_id' => $this->user->id]);

        $response = $this->get('/api/matchscores/' . $matchscore->id . '?api_token=' . $this->user->api_token);

        $response->assertJson([
            'data' => [
                'id' => $matchscore->id,
                'user_id' => $matchscore->user_id,
                'match_id' => $matchscore->match_id,
                'round' => $matchscore->round,
                'time' => $matchscore->time,
                'round_total_score' => $matchscore->round_total_score,
                'negative_score' => $matchscore->negative_score,
                'additional_score' => $matchscore->additional_score,
                'cards_score' => $matchscore->cards_score,
                'opponent_score' => $matchscore->opponent_score,
                'pot' => $matchscore->pot,
                'got' => $matchscore->got,
            ]
        ]);
    }

    /** @test */
    public function only_the_users_match_scores_can_be_retrieved()
    {
        $matchscore = MatchScore::factory()->create( ['user_id' => $this->user->id]);

        $anotherUser = User::factory()->create();

        $response = $this->get('/api/matchscores/' . $matchscore->id . '?api_token=' . $anotherUser->api_token);

        $response->assertStatus(403);
        // 404 => not found
        // 403 => forbidden -> mais usado em APIs
        // 401 => unauthorized
    }

    /** @test */
    public function a_match_score_can_be_patched()
    {
        $matchscore = MatchScore::factory()->create( ['user_id' => $this->user->id] );

        $response = $this->patch('/api/matchscores/' . $matchscore->id, $this->data());

        $matchscore = $matchscore->fresh();

        $this->assertEquals(1, $matchscore->match_id);
        $this->assertEquals(1, $matchscore->round);
        $this->assertEquals(30, $matchscore->time);
        $this->assertEquals(1200, $matchscore->round_total_score);
        $this->assertEquals(-100, $matchscore->negative_score);
        $this->assertEquals(600, $matchscore->additional_score);
        $this->assertEquals(300, $matchscore->cards_score);
        $this->assertEquals(1200, $matchscore->opponent_score);
        $this->assertEquals('no', $matchscore->pot);
        $this->assertEquals('no', $matchscore->got);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'data' => [
                'id' => $matchscore->id,
            ],
            'links' => [
                'self' => $matchscore->path(),
            ]
        ]);
    }

    /** @test */
    public function only_the_owner_of_the_match_score_can_patch_the_match_score()
    {
        $matchscore = MatchScore::factory()->create();

        $anotherUser = User::factory()->create();

        $response = $this->patch('/api/matchscores/' . $matchscore->id, array_merge($this->data(), ['api_token' => $anotherUser->api_token]));

        $response->assertStatus(403);
    }

    /** @test */
    public function a_match_score_can_be_deleted()
    {
        $matchscore = MatchScore::factory()->create( ['user_id' => $this->user->id] );

        $response = $this->delete('/api/matchscores/' . $matchscore->id, ['api_token' => $this->user->api_token]);

        $this->assertCount(0, MatchScore::all());

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function only_the_owner_can_delete_the_match_score()
    {
        $matchscore = MatchScore::factory()->create();

        $anotherUser = User::factory()->create();

        $response = $this->delete('/api/matchscores/' . $matchscore->id, ['api_token' => $this->user->api_token]);

        $response->assertStatus(403);
    }

    private function data()
    {
        return [
            'user_id' => 1,
            'match_id' => 1,
            'round' => 1,
            'time' => 30,
            'round_total_score' => 1200,
            'negative_score' => -100,
            'additional_score' => 600,
            'cards_score' => 300,
            'opponent_score' => 1200,
            'pot' => 'no',
            'got' => 'no',
            'api_token' => $this->user->api_token,
        ];
    }
}
