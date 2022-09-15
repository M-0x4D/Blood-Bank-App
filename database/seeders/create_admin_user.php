<?php

namespace Database\Seeders;

use App\models\Client;
use Illuminate\Database\Seeder;

class create_admin_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user =new  Client();
        $roleId = [1];
        $user->client_role()->attach($roleId , ['model_type' => 'test' , 'model_id' => 3]);
        
    }
}
