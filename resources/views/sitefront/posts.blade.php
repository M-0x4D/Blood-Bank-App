@extends('layouts.site.site')


@section('posts')


<br><br>

<body class="article">
    
<div class="view">
<div class="container blog-page">
    <div class="row ">
    <div class="owl-carousel articles-carousel">
    @foreach($posts as $post)
                        <!-- Set up your HTML -->
                       

<div class="card">
    <div class="photo">
        <img src="{{asset('Images/'. $post->image)}}" class="card-img-top" alt="...">
        <a href="{{route('post-details' , ['id' => $post->id])}}" class="click">المزيد</a>
    </div>
    <a href="#" class="favourite">
        <i class="far fa-heart"></i>
    </a>

    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">
            {{$post->content}}

    </p>
    </div>
</div>

                       
                        @endforeach
                        </div>
</div>
    </div>
</div>
</body>
<br><br>
@endsection