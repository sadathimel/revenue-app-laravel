<?php

namespace Database\Seeders;

use App\Models\client\ClientType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('client_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        for ($i = 1 ;$i < 3; $i++){
            $faker = Faker\Factory::create();
            ClientType::create([
                'uuid' => Str::uuid(),
                'title' => $faker->randomElement(['agency', 'direct']),
                'note' => 'Lorem Ipsum typesetting industry. Lorem Ipsum seeder example '.$i,
                'created_by'    => 1,
                'updated_by'    => 1,
            ]);
        }
    }
}
