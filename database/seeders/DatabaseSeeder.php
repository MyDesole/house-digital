<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemFeedback;
use App\Models\ItemProperty;
use App\Models\Property;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        Item::factory(50)->create();
        Property::factory(50)->create();
        ItemFeedback::factory(200)->create();
        ItemProperty::factory(200)->create();
    }
}
