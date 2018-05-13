<?php

use Illuminate\Database\Seeder;

class TestLabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('test_labs')->insert([
            'name' => 'Випробування коліс',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        Db::table('test_labs')->insert([
            'name' => 'Стендові випробування',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        Db::table('test_labs')->insert([
            'name' => 'Остаточні випробування',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
