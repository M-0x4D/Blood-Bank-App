<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Governrate;

class GovernrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $governrate = new Governrate();
        $governrate->name = 'الدقهليه';
        $governrate->save();
    }
}
