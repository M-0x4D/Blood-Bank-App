<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Governrate;
use App\models\City;
use App\models\BloodType;
use App\models\Category;

class BusinessController extends Controller
{
    //
    function governrates()
    {
        $governrates = Governrate::all();
        return view('dashboard-front.governrates')->with('governrates' , $governrates);

    }



    function cities()
    {
        $cities = City::all();
        return view('dashboard-front.cities')->with('cities' , $cities);

    }



    function blood_types()
    {
        $bloodtypes = BloodType::all();
        return view('dashboard-front.bloodtypes')->with('bloodtypes' , $bloodtypes);

    }
    function categories()
    {
        $categories = Category::all();
        return view('dashboard-front.categories')->with('categories' , $categories);

    }
    
}
