<?php

namespace Tests\Unit;

use App\User;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class APITest extends TestCase
{

	
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserCreation()
    {
    	$response = $this->json('POST', '/api/register', [
    		'name' => 'Demo User',
    		'email' => str_random(10) . '@demo.com',
    		'password' => '12345',
    	]);

    	$response->assertStatus(200)->assertJsonStructure([
    		'success' => ['token', 'name']
    	]);
    }

    public function testUserLogin() {
    	$response = $this->json('POST', '/api/login', [
            'email' => 'an@gmail.com',
            'password' => 'secret'
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'success' => ['token']
        ]);
    }

    public function testCategoryFetch() {
        $user = User::find(1);

        $response = $this->actingAs($user, 'api')
            ->json('GET', '/api/category')
            ->assertStatus(200)->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            ]
        );
    }

    public function testCategoryDeletion() {
    	$user = User::find(1);

    	$category = Category::create(['name' => 'To be deleted']);

    	$response = $this->actingAs($user, 'api')
	        ->json('DELETE', "/api/category/{$category->id}")
	        ->assertStatus(200)->assertJson([
	            'status' => true,
            	'message' => 'Category Deleted'
        ]);
    }
}
