<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Create an admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
        ])->forceFill(['is_admin' => true])->save();

        // Create a normal user
        User::factory()->create([
            'name' => 'Reader',
            'email' => 'reader@example.com',
            'password' => 'password',
        ]);

        // Seed a few authors and publishers
        $author1 = Author::create(['name' => 'Author One']);
        $author2 = Author::create(['name' => 'Author Two']);

        $pub1 = Publisher::create(['name' => 'Publisher A']);
        $pub2 = Publisher::create(['name' => 'Publisher B']);

        // Seed some books
        Book::create([
            'title' => 'First Book',
            'description' => 'An introductory book.',
            'price' => 9.99,
            'release_date' => now()->subYear()->toDateString(),
            'author_id' => $author1->id,
            'publisher_id' => $pub1->id,
        ]);

        Book::create([
            'title' => 'Second Book',
            'description' => 'A follow-up volume.',
            'price' => 14.50,
            'release_date' => now()->subMonths(6)->toDateString(),
            'author_id' => $author2->id,
            'publisher_id' => $pub2->id,
        ]);
    }
}
