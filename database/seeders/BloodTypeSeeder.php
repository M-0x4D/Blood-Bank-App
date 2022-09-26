<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\BloodType;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blood_type = new BloodType();
        $blood_type->name = 'A+';
        $blood_type->save();
    }
}
