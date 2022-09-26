<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $city = new City();
        $city->name = 'المنصوره';
        $city->governrate_id = 1;
        $city->save();
    }
}
