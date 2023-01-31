<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(MonthSeeder::class);
        $this->call(VatSeeder::class);
        $this->call(ClientTypeSeeder::class);
//        $this->call(ClientSeeder::class);
//        $this->call(CampaignSeeder::class);
    }
}
