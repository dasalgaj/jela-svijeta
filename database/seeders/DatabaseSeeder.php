<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        $faker->seed(1235);

        \App\Models\Post::factory()->create([
            'author' => 'Dario',
                    'en' => [
                        'title' => $faker->foodName(),
                        'ingredients' => $faker->meatName(),
                        'category' => $faker->vegetableName(),
                        'tags' => $faker->sauceName(),
                        'status' => 'created'
                    ],
                    'hr' => [
                        'title' => 'Pizza sa sirom',
                        'ingredients' => 'Pileća prsa',
                        'category' => 'Jam',
                        'tags' => 'Cili umak',
                        'status' => 'created'
                    ],
        ]);

        $faker->seed(1237);

        \App\Models\Post::factory()->create([
            'author' => 'Dario',
                    'en' => [
                        'title' => $faker->foodName(),
                        'ingredients' => $faker->meatName(),
                        'category' => $faker->vegetableName(),
                        'tags' => $faker->sauceName(),
                        'status' => 'created'
                    ],
                    'hr' => [
                        'title' => 'Cheeseburger sa slaninom',
                        'ingredients' => 'Kobasica',
                        'category' => 'Krastavac',
                        'tags' => 'Cili umak',
                        'status' => 'created'
                    ],
        ]);

        $faker->seed(1239);

        \App\Models\Post::factory()->create([
            'author' => 'Dario',
                    'en' => [
                        'title' => $faker->foodName(),
                        'ingredients' => $faker->meatName(),
                        'category' => $faker->vegetableName(),
                        'tags' => $faker->sauceName(),
                        'status' => 'created'
                    ],
                    'hr' => [
                        'title' => 'Mali burger sa slaninom',
                        'ingredients' => 'Pileća prsa',
                        'category' => 'Paprika',
                        'tags' => 'Majoneza',
                        'status' => 'created'
                    ],
        ]);

        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
