<?php

use Illuminate\Database\Seeder;

class MotorcycleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('motorcycles')->insert([
            'brand' => 'Yamaha YZF R6',
            'engine' => '200 л. с',
            'color' => 'red',
            'transmission' => 'Механіка',
            'production_year' => '2004-02-04',
            'stroller' => '0',
            'make_now' => '0',
            'workshop_id' => '1',
        ]);
        Db::table('motorcycles')->insert([
            'brand' => 'Yamaha R1',
            'engine' => '150 л. с',
            'color' => 'pink',
            'transmission' => 'Механіка',
            'production_year' => '2006-02-04',
            'stroller' => '0',
            'make_now' => '0',
            'workshop_id' => '1',
        ]);
        Db::table('motorcycles')->insert([
            'brand' => 'Yamaha RX',
            'engine' => '200 л. с',
            'color' => 'blue',
            'transmission' => 'Механіка',
            'production_year' => '2006-03-06',
            'stroller' => '0',
            'make_now' => '0',
            'workshop_id' => '1',
        ]);
    }
}
