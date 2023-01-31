<?php

namespace Database\Seeders;

use App\Models\client\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('clients')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        for ($i = 1 ;$i < 100; $i++){
            $faker = Faker\Factory::create();
            Client::create([
                'uuid' => Str::uuid(),
                'client_type_id'   => $faker->numberBetween(1,2),
                'name' => $faker->unique()->word,
                'email' => $faker->unique()->email,
                'phone' => $faker->unique()->phoneNumber,
                'address' => $faker->address,
                'logo' => $faker->url,
                'commission' => $faker->randomFloat('2', 0, 2),
                'created_by'    => 1,
                'updated_by'    => 1,
            ]);
        }
    }
}
