<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++){
            DB::table('computers')->insert([
                'computer_name'=>'Lab1-PC0'.$i,
                'model'=>'Dell Optiplex 709'.$i,
                'operating_system' => 'Win '.$i,
                'processor' => 'Intel Core i5-1140'.$i,
                'memory' => $faker->numberBetween(1,10),
                'available'=> $faker->boolean(),
            ]);
        }
    }
}
