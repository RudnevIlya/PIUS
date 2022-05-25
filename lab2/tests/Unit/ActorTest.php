<?php

use App\Models\Actor;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a actor', function () {
    $attributes = Actor::factory()->raw();
    $response = $this->postJson('/api/v1/actors', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('actor', $attributes);
});

it('can get a actor', function () {
    $actor = Actor::factory()->create();

    $response = $this->getJson("/api/v1/actors/{$actor->id}");

    $data = [
        'data' => [
            'id' => $actor->id,
            'full_name' => $actor->full_name,
            'height' => $actor->height,
            'birthdate' => $actor->birthdate,
        ],
        'errors' => [

        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can not get a actor with 404', function () {
    $response = $this->getJson("/api/v1/actors/0");

    $response->assertStatus(404);
});

it('can not get a actor with 400', function () {
    $response = $this->getJson("/api/v1/actors/ahfgaufgsuya");

    $response->assertStatus(400);
});

it('can put a actor', function () {
    $actor = Actor::factory()->create();
    $updatedActor = ['full_name' => 'Put Actor'];
    $response = $this->putJson("/api/v1/actors/{$actor->id}", $updatedActor);
    $response->assertStatus(200);
    $this->assertDatabaseHas('actor', $updatedActor);
});

it('can patch a actor', function () {
    $actor = Actor::factory()->create();
    $updatedActor = ['full_name' => 'Patch Actor'];
    $response = $this->patchJson("/api/v1/actors/{$actor->id}", $updatedActor);
    $response->assertStatus(200);
    $this->assertDatabaseHas('actor', $updatedActor);
});

it('can delete a actor', function () {
    $actor = Actor::factory()->create();
    $response = $this->deleteJson("/api/v1/actors/{$actor->id}");
    $response->assertStatus(200);
}); 
