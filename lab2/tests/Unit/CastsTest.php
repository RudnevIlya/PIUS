<?php

use App\Models\Cast;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a cast', function () {
    $attributes = Cast::factory()->raw();
    $response = $this->postJson('/api/v1/casts', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('cast', $attributes);
});

it('can get a cast', function () {
    $cast = Cast::factory()->create();

    $response = $this->getJson("/api/v1/casts/{$cast->id}");

    $data = [
        'data' => [
            'id' => $cast->id,
            'id_film' => $cast->id_film,
            'id_actor' => $cast->id_actor,
            'role' => $cast->role,
        ],
        'errors' => [

        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can not get a cast with 404', function () {
    $response = $this->getJson("/api/v1/casts/0");

    $response->assertStatus(404);
});

it('can not get a cast with 400', function () {
    $response = $this->getJson("/api/v1/casts/ahfgaufgsuya");

    $response->assertStatus(400);
});

it('can put a cast', function () {
    $cast = Cast::factory()->create();
    $updatedCast = ['role' => 'Put Cast'];
    $response = $this->putJson("/api/v1/casts/{$cast->id}", $updatedCast);
    $response->assertStatus(200);
    $this->assertDatabaseHas('cast', $updatedCast);
});

it('can patch a cast', function () {
    $cast = Cast::factory()->create();
    $updatedCast = ['role' => 'Patch Cast'];
    $response = $this->patchJson("/api/v1/casts/{$cast->id}", $updatedCast);
    $response->assertStatus(200);
    $this->assertDatabaseHas('cast', $updatedCast);
});

it('can delete a cast', function () {
    $cast = Cast::factory()->create();
    $response = $this->deleteJson("/api/v1/casts/{$cast->id}");
    $response->assertStatus(200);
}); 
