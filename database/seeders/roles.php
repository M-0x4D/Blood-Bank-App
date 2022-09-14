<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            'owner' , 
            'admin',
            'editor' ,
            'normal'

        ];

        foreach ($roles as $role) {
            # code...
            Role::create(['name' => $role , 'guard_name' => 'token']);

        }
    }
}
