<?php

namespace Database\Seeders;

use App\Models\campaign\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    //     DB::table('campaigns')->truncate();
    //     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    //     for ($i = 1 ;$i < 100; $i++){
    //         $faker = Faker\Factory::create();
    //         Campaign::create([
    //             'uuid' => Str::uuid(),
    //             'client_id'   => $faker->numberBetween(1,20),
    //             'title' => $faker->unique()->catchPhrase,
    //             'description' => 'Lorem Ipsum typesetting industry. Lorem Ipsum seeder example '.$i,
    //             'created_by'    => 1,
    //             'updated_by'    => 1,
    //         ]);
    //     }
    // }
}
