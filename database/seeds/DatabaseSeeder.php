<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WorkshopTableSeeder::class);
        $this->call(BrigadeTableSeeder::class);
        $this->call(TestLabTableSeeder::class);
        $this->call(CarTableSeeder::class);
        $this->call(EngineerTableSeeder::class);
        $this->call(CarTestLabTableSeeder::class);
        $this->call(WorkerTableSeeder::class);
        $this->call(BusTableSeeder::class);
        $this->call(LorryTableSeeder::class);
        $this->call(MotorcycleTableSeeder::class);
    }
}
