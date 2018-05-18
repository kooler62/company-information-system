<?php

use Illuminate\Database\Seeder;

class WorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            'last_name' => 'Чепишко',
            'first_name' => 'Віталій',
            'middle_name' => 'Сергійович',
            'phone_number' => '38050265444',
            'personal_number' => '3443',
            'home_address' => 'Головна, 12',
            'category' => 'Зварник',
            'is_brigadier' => '0',
            'employment_date' => '2018-05-18',
            'brigade_id' => '1',
            'workshop_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('workers')->insert([
            'last_name' => 'Скакун',
            'first_name' => 'Анатолій',
            'middle_name' => 'Вікторович',
            'phone_number' => '38050265666',
            'personal_number' => '3223',
            'home_address' => 'Головна, 13',
            'category' => 'Токар',
            'is_brigadier' => '1',
            'employment_date' => '2018-05-18',
            'brigade_id' => '2',
            'workshop_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('workers')->insert([
            'last_name' => 'Струк',
            'first_name' => 'Андрій',
            'middle_name' => 'Петрович',
            'phone_number' => '38050333666',
            'personal_number' => '5523',
            'home_address' => 'Головна, 14',
            'category' => 'Токар',
            'is_brigadier' => '0',
            'employment_date' => '2018-03-10',
            'brigade_id' => '2',
            'workshop_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('workers')->insert([
            'last_name' => 'Гура',
            'first_name' => 'Захар',
            'middle_name' => 'Степанович',
            'phone_number' => '38050111666',
            'personal_number' => '3273',
            'home_address' => 'Головна, 8',
            'category' => 'Токар',
            'is_brigadier' => '0',
            'employment_date' => '2018-04-12',
            'brigade_id' => '2',
            'workshop_id' => '2',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
