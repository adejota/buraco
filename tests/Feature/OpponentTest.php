<?php

namespace Tests\Feature;

use App\Models\Opponent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class OpponentTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function a_list_of_opponents_can_be_fetched_for_the_authenticated_user()
    {        
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $opponent = Opponent::factory()->create(['user_id' => $user->id]);
        $anotherOpponent = Opponent::factory()->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/opponents?api_token=' . $user->api_token);

        $response->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    [
                        "data" => [
                            'id' => $opponent->id,
                        ],
                    ],
                ],
            ]);
    }

    /** @test */
    public function an_unauthenticated_user_should_redirect_to_login()
    {
        $data = $this->data();

        $response = $this->post('/api/opponents', array_merge($data, ['api_token' => '']));

        $response->assertRedirect('/login');
        $this->assertCount(0, Opponent::all());
    }

    /** @test */
    public function an_authenticated_user_can_add_an_opponent()
    {        
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();

        $data = $this->data();

        $response = $this->post('/api/opponents', $data);

        $opponent = Opponent::first();

        $this->assertEquals('Test Name', $opponent->name);

        $response->assertStatus(Response::HTTP_CREATED);
            // o symfony do laravel possui uma classe que permite alterar o número do status por seu nome

        $response->assertJson([
            'data' => [
                'id' => $opponent->id,
            ],
            'links' => [
                'self' => $opponent->path(),
            ],
        ]);
    }

    /** @test */
    public function fields_are_required()
    {
        collect( ['name'] )
            ->each(function($field) {
                $data = array_merge($this->data(), [$field => '']);

                $response = $this->post('/api/opponents', $data);
                
                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Opponent::all());
            });

    }

    /** @test */
    public function an_opponent_can_be_retrieved()
    {
        $opponent = Opponent::factory()->create( ['user_id' => $this->user->id]);

        $response = $this->get('/api/opponents/' . $opponent->id . '?api_token=' . $this->user->api_token);

        $response->assertJson([
             'data' => [
                'id' => $opponent->id,
                'user_id' => $opponent->user_id,
                'name' => $opponent->name,
                'avatar' => $opponent->avatar,
                'wins' => $opponent->wins,
                'losses' => $opponent->losses,
            ]
        ]);
    }

    /** @test */
    public function only_the_users_opponents_can_be_retrieved()
    {
        $opponent = Opponent::factory()->create( ['user_id' => $this->user->id]);

        $anotherUser = User::factory()->create();

        $response = $this->get('/api/opponents/' . $opponent->id . '?api_token=' . $anotherUser->api_token);

        $response->assertStatus(403);
        // 404 => not found
        // 403 => forbidden -> mais usado em APIs
        // 401 => unauthorized
    }

    /** @test */
    public function an_opponent_can_be_patched()
    {
        $opponent = Opponent::factory()->create( ['user_id' => $this->user->id] );

        $response = $this->patch('/api/opponents/' . $opponent->id, $this->data());

        $opponent = $opponent->fresh();

        $this->assertEquals('Test Name', $opponent->name);

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'data' => [
                'id' => $opponent->id,
            ],
            'links' => [
                'self' => $opponent->path(),
            ]
        ]);
    }

    /** @test */
    public function only_the_owner_of_the_opponent_can_patch_the_opponent()
    {
        $opponent = Opponent::factory()->create();

        $anotherUser = User::factory()->create();

        $response = $this->patch('/api/opponents/' . $opponent->id, array_merge($this->data(), ['api_token' => $anotherUser->api_token]));

        $response->assertStatus(403);
    }

    /** @test */
    public function an_opponent_can_be_deleted()
    {
        $opponent = Opponent::factory()->create( ['user_id' => $this->user->id] );

        $response = $this->delete('/api/opponents/' . $opponent->id, ['api_token' => $this->user->api_token]);

        $this->assertCount(0, Opponent::all());

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function only_the_owner_can_delete_the_opponent()
    {
        $opponent = Opponent::factory()->create();

        $anotherUser = User::factory()->create();

        $response = $this->delete('/api/opponents/' . $opponent->id, ['api_token' => $this->user->api_token]);

        $response->assertStatus(403);
    }

    private function data()
    {
        return [
            'name' => 'Test Name',
            'api_token' => $this->user->api_token,
        ];
    }
}
