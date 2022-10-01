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
                    <form method="POST" action="{{route('create-post')}}">
                    @csrf
                        <input class="form-control" id="exampleInputEmail1"  placeholder="tile" name="title">
                        
                        <input class="form-control" id="exampleInputEmail1"  placeholder="content" name="content">
                        
                        
                       
                        
                        <select class="form-control" id="governorates" name="category_id">
                            <option selected disabled hidden value="">category</option>

                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            
                        </select>
                                          
                        <input class="form-control"  type="file" id="myFile" name="image">
                                                
                        <div class="create-btn">
                            <input type="submit" value="إنشاء"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
</body>

@endsection