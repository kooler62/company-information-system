<?php

use Illuminate\Database\Seeder;

class WorkshopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshops')->insert([
            'workshop_name' => 'Цех 1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('workshops')->insert([
            'workshop_name' => 'Цех 2',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
