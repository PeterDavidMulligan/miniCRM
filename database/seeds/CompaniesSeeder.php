<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the companies seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $amount = 50;

        for ($i = 0; $i < $amount; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'logo' => $faker->imageUrl($width = 100, $height = 100),
                'website' => $faker->url
            ]);
        }
    }
}
