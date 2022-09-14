<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class create_role_permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission =new  Permission();
        $roleId = [1];
        $permissions = [1,2,3,4];

        foreach ($permissions as $per) {
            # code...
            $permission->permission_role()->attach($roleId , ['permission_id' => $per ]);

        }
       
    }
}
