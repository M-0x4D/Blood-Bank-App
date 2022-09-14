<?php

namespace Database\Seeders;

use App\models\Permission;
use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'write-post' , 
            'delete-post',
            'edit-post' ,
            'create-donation-request'

        ];

        foreach ($permissions as $permission) {
            # code...
            Permission::create(['name' => $permission , 'guard_name' => 'token']);

        }
    }
}
