<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Permission;

class PermissionsController extends Controller
{
    //
    function edit_permission_view(Request $request)
    {
        $permission_id = $request->id;
        return view('dashboard-front.edit_permission')->with('permission_id' , $permission_id);

    }



    function edit(Request $request)
    {
        Permission::where('id' , $request->permission_id)->update([
            'name' => $request->name
        ]);
        $permissions = Permission::all();
        return redirect('permissions')->with('permissions' , $permissions);
    }
}
