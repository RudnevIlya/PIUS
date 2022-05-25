<?php

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a film', function () {
    $attributes = Film::factory()->raw();
    $response = $this->postJson('/api/v1/films', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('film', $attributes);
});

it('can get a film', function () {
    $film = Film::factory()->create();

    $response = $this->getJson("/api/v1/films/{$film->id}");

    $data = [
        'data' => [
            'id' => $film->id,
            'title' => $film->title,
            'rate' => $film->rate,
            'duration' => $film->duration,
            'premiere_date' => $film->premiere_date,
        ],
        'errors' => [

        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can not get a film with 404', function () {
    $response = $this->getJson("/api/v1/films/0");

    $response->assertStatus(404);
});

it('can not get a film with 400', function () {
    $response = $this->getJson("/api/v1/films/ahfgaufgsuya");

    $response->assertStatus(400);
});

it('can put a film', function () {
    $film = Film::factory()->create();
    $updatedFilm = ['title' => 'Put Film'];
    $response = $this->putJson("/api/v1/films/{$film->id}", $updatedFilm);
    $response->assertStatus(200);
    $this->assertDatabaseHas('film', $updatedFilm);
});

it('can patch a film', function () {
    $film = Film::factory()->create();
    $updatedFilm = ['title' => 'Patch Film'];
    $response = $this->patchJson("/api/v1/films/{$film->id}", $updatedFilm);
    $response->assertStatus(200);
    $this->assertDatabaseHas('film', $updatedFilm);
});

it('can delete a film', function () {
    $film = Film::factory()->create();
    $response = $this->deleteJson("/api/v1/films/{$film->id}");
    $response->assertStatus(200);
}); 
