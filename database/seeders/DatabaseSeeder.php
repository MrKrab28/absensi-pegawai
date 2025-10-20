<?php

namespace Database\Seeders;

use App\Models\Aset;
use App\Models\User;
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
        // User::factory(10)->create();
    //    $faker = Faker::create('id_ID');
        User::factory()->create([
            'nama' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123'),
        ]);
        User::factory(17)->create();
        // $this->call([
        //     CategorySeeder::class,
        //     CourseSeeder::class,
        //     ModulSeeder::class,
        //     QuisSeeder::class,
        //     JawbanSeeder::class,
        //     RoadmapSeeder::class,
        //     NodeSeeder::class,
        //     ConnectionSeeder::class,
        //     // CompletionSeeder::class
        // ]);
        $this->call([
            AsetSeeder::class
        ]);
    }
}
