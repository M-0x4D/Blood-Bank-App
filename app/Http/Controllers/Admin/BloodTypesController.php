<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\BloodType;

class BloodTypesController extends Controller
{
    

    function create_bloodtype_view()
    {
        return view('dashboard-front.create_bloodtype');
    }

    function create(Request $request)
    {
        BloodType::create([
            'name' => $request->name , 

        ]);
        $bloodtypes = BloodType::all();
        return redirect('blood-types')->with('bloodtypes' , $bloodtypes);

    }



    function show(Request $request)
    {

    }


    function edit_bloodtype_view(Request $request)
    {
        $bloodtype_id = $request->id;
        return view('dashboard-front.edit_bloodtype')->with('bloodtype_id' , $bloodtype_id);

    }

    function edit(Request $request)
    {
        BloodType::where('id' , $request->bloodtype_id)->update([
            'name' => $request->name
        ]);
        $bloodtypes = BloodType::all();
        return redirect('blood-types')->with('bloodtypes' , $bloodtypes);

    }

    function delete(Request $request)
    {

        $bloodtype=Governrate::find($request->id);
        $bloodtype->delete();
        $bloodtypes = City::all();
        return redirect('blood-types')->with('bloodtypes' , $bloodtypes);
    }
}
