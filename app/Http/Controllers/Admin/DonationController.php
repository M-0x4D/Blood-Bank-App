<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\DonationRequest;

class DonationController extends Controller
{

    function return_donations()
    {
        $donations = DonationRequest::all();
        return view('dashboard-front.donations')->with('donations' , $donations);
    }

    function create_donation_view()
    {
        return view('dashboard-front.create_governrate');
    }

    function create(Request $request)
    {
        Governrate::create([
            'name' => $request->name , 

        ]);
        $governrates = Governrate::all();
        return redirect('governrates')->with('governrates' , $governrates);

    }


    function show(Request $request)
    {

    }

    function edit_donation_view(Request $request)
    {
        $governrate_id = $request->id;
        return view('dashboard-front.edit_governrate')->with('governrate_id' , $governrate_id);

    }



    function edit(Request $request)
    {
        Governrate::where('id' , $request->governrate_id)->update([
            'name' => $request->name
        ]);
        $governrates = Governrate::all();
        return redirect('governrates')->with('governrates' , $governrates);
    }

    function delete(Request $request)
    {

        $governrate=Governrate::find($request->id);
        $governrate->delete();
        $governrates = Governrate::all();
        return redirect('governrates')->with('governrates' , $governrates);
    }
}
