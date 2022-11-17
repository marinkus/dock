<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('en_GB');

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.user',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'dev',
            'email' => 'dev@dev.dev',
            'password' => Hash::make('123'),
        ]);

        foreach([
            'Santa Maria',
            'Independet',
            'Monica',
            'KONO',
            'Titanic',
            'Evergiven',
            'Veronica'
        ] as $boatName) {
            DB::table('ships')->insert([
                'title' => $boatName,
                'country' => $faker->countryCode,
                'type' => rand(1, 4)
            ]);
        }

        foreach(range(1, 50) as $_) {
            DB::table('cargos')->insert([
                'title' => $faker->word,
                'type' => $faker->word,
                'client' => $faker->name,
                'ship_id' => rand(1, 7),
            ]);
        }
    }
}
