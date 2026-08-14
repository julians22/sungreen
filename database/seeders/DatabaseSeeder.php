<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = [
            ['name' => 'Uncategorized']
        ];

        foreach ($categories as $category) {
            \App\Models\ProductCategory::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
            ]);
        }

        \App\Models\Product::factory(10)->uncategorized()->create();

        \App\Models\Gallery::factory(10)->create();
    }
}
