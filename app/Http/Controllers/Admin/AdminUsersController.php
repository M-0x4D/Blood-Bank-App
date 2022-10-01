<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Admin;

class AdminUsersController extends Controller
{
    //

    function edit_admin_user_view(Request $request)
    {
        $user_id = $request->id;
        return view('dashboard-front.edit_admin_user')->with('user_id' , $user_id);

    }



    function edit(Request $request)
    {
        Admin::where('id' , $request->user_id)->update([
            'name' => $request->name
        ]);
        $users = Admin::all();
        return redirect('admin-users')->with('users' , $users);
    }
}
