<?php

namespace Database\Seeders;

use App\models\Client;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class create_client_permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $client =new  Client();
        $clientId = 2;
        $permissions = [1,2,3,4];

        foreach ($permissions as $per) {
            # code...
            $client->client_permisson()->attach($per , ['model_id' => $clientId  , 'model_type' => 'test']);

        }
    }
}
