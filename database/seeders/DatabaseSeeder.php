<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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
        $categories = ['Pasta', 'Sughi', 'Dolci', 'Made in Italy', 'Ricettari', 'Biscotti', 'Aperitivi', 'Prosciutto', 'Parmigiano', 'Vini'];
        foreach($categories as $category) {
            Category::create(['categoria'=>$category]);
        }
    }
}
