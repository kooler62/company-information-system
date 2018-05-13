<?php

use Illuminate\Database\Seeder;

class EngineerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('engineers')->insert([
            'first_name' => 'Степан',
            'last_name' => 'Олійник',
            'middle_name' => 'Дмитрович',
            'phone_number' => '380506678666',
            'personal_number' => '7770',
            'home_address' => 'golovna street, 12',
            'category' => 'Інженер',
            'position' => 'Майстер',
            'employment_date' => '2018-05-13',
            'workshop_id' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('engineers')->insert([
            'first_name' => 'Микола',
            'last_name' => 'Продан',
            'middle_name' => 'Сергійович',
            'phone_number' => '380507778777',
            'personal_number' => '6660',
            'home_address' => 'kobylianska street, 13',
            'category' => 'Технолог',
            'position' => '',
            'employment_date' => '2018-04-13',
            'workshop_id' => '2',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}