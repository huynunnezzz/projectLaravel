<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Computer;
class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();
        $computer_id = Computer::pluck('id')->toArray();
        for($i=0;$i<10;$i++){
            DB::table('issues')->insert([
                'computer_id'=> $faker->randomElement($computer_id),
                'reported_by'=>$faker->name(),
                'reported_date' => $faker->dateTime(),
                'description' => $faker->sentence(),
                'urgency' => $faker->randomElement(['Low','Medium','High']),
                'status' =>$faker->randomElement(['Open','In Process','Resolved'])
            ]);
        }
    }
}
