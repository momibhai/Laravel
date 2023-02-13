<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registeration;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=100; $i++){
        $faker = Faker::create();
        $customer = new Registeration;
        $customer->name	 = $faker->name;
        $customer->email = $faker->email;
        $customer->password	 = $faker->password;
        $customer->gender = "M";
        $customer->dob = now();
        $customer->save();
    }

    }
}
