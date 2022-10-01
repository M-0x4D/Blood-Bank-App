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
        $donation_id = $request->id;
        return view('dashboard-front.edit_donation')->with('donation_id' , $donation_id);

    }



    function edit(Request $request)
    {
        DonationRequest::where('id' , $request->donation_id)->update([
            'patient_name' => $request->patient_name
        ]);
        $donations = DonationRequest::all();
        return redirect('donations')->with('donations' , $donations);
    }

    function delete(Request $request)
    {

        $donation=DonationRequest::find($request->id);
        $donation->delete();
        $donations = Governrate::all();
        return redirect('donations')->with('donations' , $donations);
    }
}
