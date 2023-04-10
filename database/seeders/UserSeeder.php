<?php

namespace Database\Seeders;

use App\Enums\UserLevelEnum;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $arr =[];
        $faker = Factory::create('en_US');
        for ($i=1;$i<=2;$i++){
            $arr[] = [
                'name'=> $faker->firstName . ' ' . $faker->lastName,
                'email'=> $faker->email,
                'password'=>bcrypt('12345678'),
                'level'=> $faker->randomElement(['1', '0']),
                'remember_token'=>null,
            ];
        }
        User::insert($arr);
    }
}
