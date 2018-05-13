<?php

use Illuminate\Database\Seeder;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'brand' => 'audi TT',
            'body_type' => 'Купе',
            'engine' => '180 л.с. 1.8 л.',
            'color' => '#4286f4',
            'transmission' => 'Автомат',
            'production_year' => '2018-05-15',
            'make_now' => '0',
            'workshop_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('cars')->insert([
            'brand' => 'mazda 6',
            'body_type' => 'Седан',
            'engine' => '170 л.с. 1.8 л.',
            'color' => 'space gray',
            'transmission' => 'Автомат',
            'make_now' => '1',
            'workshop_id' => '2',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
