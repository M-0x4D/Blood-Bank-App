<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Client;

class UsersController extends Controller
{
    //

    function edit_user_view(Request $request)
    {
        $client_id = $request->id;
        return view('dashboard-front.edit_user')->with('client_id' , $client_id);

    }



    function edit(Request $request)
    {
        Client::where('id' , $request->client_id)->update([
            'name' => $request->name
        ]);
        $clients = Client::all();
        return redirect('users')->with('clients' , $clients);
    }
}
