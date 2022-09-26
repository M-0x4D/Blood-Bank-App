@extends('layouts.site.site')


@section('register')


<body class="create">
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
                    <form method="POST" action="{{route('web-register')}}">
                    @csrf
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الإسم" name="name">
                        
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى" name="email">
                        
                        <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="date_of_birth">
                        
                        <!-- <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="فصيلة الدم" name='blood_type_id'> -->

                        <select class="form-control" id="bloodtypes" name="blood_type_id">
                            <option selected disabled hidden value="">فصيله الدم</option>
                            <option value=1>A+</option>
                            <option value="2">B+</option>
                        </select>
                        
                        <select class="form-control" id="governorates" name="governorate_id">
                            <option selected disabled hidden value="">المحافظة</option>
                            <option value="1">الدقهلية</option>
                            <option value="2">الغربية</option>
                        </select>
                        
                        <!-- <select class="form-control" id="cities" name="city_id">
                            <option  selected disabled hidden value="">المدينه</option>
                            <option value=1>المنصوره</option>
                            <option value="2">بلقاس</option>
                        </select> -->

                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="city id" name='city_id'>


                        
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف" name='phone'>
                        
                        <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="date" name='last_donation_date'>
                        
                        <input name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                        
                        <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور"> -->
                        
                        <div class="create-btn">
                            <input type="submit" value="إنشاء"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
</body>

@endsection