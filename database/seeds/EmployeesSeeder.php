<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the employees seeds.
     *
     * @return void
     */
     public function run()
     {
         $faker = Faker\Factory::create();
         $amount = 50;

         $companies = App\Company::all()->pluck('id')->toArray();

         for ($i = 0; $i < $amount; $i++) {
             DB::table('employees')->insert([
                 'first_name' => $faker->firstName,
                 'last_name' => $faker->lastName,
                 'company' => $faker->randomElement($companies),
                 'email' => $faker->unique()->safeEmail,
                 'phone' => $faker->unique()->phoneNumber
             ]);
         }
     }
}
