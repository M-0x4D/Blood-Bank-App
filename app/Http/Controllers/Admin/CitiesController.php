<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\City;
use App\models\Governrate;

class CitiesController extends Controller
{

    function create_city_view()
    {
        $governrates = Governrate::all();
        return view('dashboard-front.create_city')->with('governrates' , $governrates);
    }

    function create(Request $request)
    {
        City::create([
            'name' => $request->name ,
            'governrate_id' => $request->governorate_id

        ]);
        $cities = City::all();
        return redirect('cities')->with('cities' , $cities);

    }
    


    function show(Request $request)
    {

    }


    function edit_city_view(Request $request)
    {

        $city_id = $request->id;
        $governrates = Governrate::all();
        return view('dashboard-front.edit_city')->with(['city_id' => $city_id , 'governrates' => $governrates]);
    }

    function edit(Request $request)
    {
        City::where('id' , $request->city_id)->update([
            'name' => $request->name
        ]);
        $cities = City::all();
        return redirect('cities')->with('cities' , $cities);

    }

    function delete(Request $request)
    {

        $city=City::find($request->id);
        $city->delete();
        $cities = City::all();
        return redirect('cities')->with('cities' , $cities);
    }
}
