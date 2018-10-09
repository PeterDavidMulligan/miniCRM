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
         $amount = 27;
         for ($i = 0; $i < $amount; $i++) {
             DB::table('employees')->insert([
                 'first_name' => $faker->firstName,
                 'last_name' => $faker->lastName,
                 'company' => DB::table('companies')->inRandomOrder()->first()->id,
                 'email' => $faker->unique()->safeEmail,
                 'phone' => $faker->unique()->phoneNumber
             ]);
         }
     }
}
