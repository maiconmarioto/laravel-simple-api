<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            'name' => $faker->name,
            'login' => $faker->unique()->safeEmail,
            'pass' => $faker->password,
            'created_at' => now()
        ]);
    }
}
