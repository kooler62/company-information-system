<?php

use Illuminate\Database\Seeder;

class CarTestLabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars_test_labs')->insert([
            'car_id' => '1',
            'test_lab_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('cars_test_labs')->insert([
            'car_id' => '1',
            'test_lab_id' => '2',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('cars_test_labs')->insert([
            'car_id' => '2',
            'test_lab_id' => '3',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
