
@extends('layouts.site.site')


@section('create-donation')

<body class="inside-request">


   <!--form-->
   <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                        </ol>
                    </nav>
                </div>
                <div class="account-form">
                    <form method="POST" action="{{route('wb-create-donation')}}">
                    @csrf
                        <input name="patient_name" class="form-control" id="exampleInputEmail1"  placeholder="الإسم">
                        
                        <input name="patient_age" class="form-control" id="exampleInputEmail1"  placeholder=" السن">
                        
                        <!-- <input name="" placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="date"> -->
                        

                        <select class="form-control" id="governorates" name="blood_type_id">
                            <option selected disabled hidden value="">فصيله الدم</option>
                            @foreach($bloodtypes as $bloodtype)
                            <option value="{{$bloodtype->id}}">{{$bloodtype->name}}</option>
                            @endforeach
                        </select>
                        
                        <select class="form-control" id="governorates" name="blood_type_id">
                            <option selected disabled hidden value=""> المحافظه</option>
                            @foreach($governrates as $governrate)
                            <option value="{{$governrate->id}}">{{$governrate->name}}</option>
                            @endforeach
                        </select>
                        
                        <select class="form-control" id="governorates" name="city_id">
                            <option selected disabled hidden value=""> المدينه</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        
                        <input name="patient_phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">
                        <input name="hospital_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" اسم المستشفي">
                        <input name="hospital_address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" عنوان المستشفي">
                        <input name="details" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="التفاصسل">
                        <input name="bags_num" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" عدد الاكياس المطلوبه">
                        <input name="latitude" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="latitude">
                        <input name="longitude" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="longitude">
                        
                        <input name="" placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="date">
                        
                      
                        
                        <div class="create-btn">
                            <input type="submit" value="إنشاء"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>

@endsection