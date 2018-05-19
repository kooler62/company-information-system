<?php

use Illuminate\Database\Seeder;

class BrigadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brigades')->insert([
            'brigade_name' => 'Бригада №1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('brigades')->insert([
            'brigade_name' => 'Бригада №2',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('brigades')->insert([
            'brigade_name' => 'Бригада №3',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('brigades')->insert([
            'brigade_name' => 'Бригада №4',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
