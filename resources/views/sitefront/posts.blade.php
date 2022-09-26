@extends('layouts.site.site')


@section('posts')


<br><br>

<body class="article">
    

<div class="container blog-page">
    <div class="row clearfix">
        @foreach($posts as $post)

        <div class="col-lg-4 col-md-12">
            <div class="card single_post">
                <div class="header">
                    <h2><strong>Latest</strong> Post</h2>
                </div>
                <div class="body">
                    <h3 class="m-t-0 m-b-5"><a href="blog-details.html">{{$post->title}}</a></h3>
                    <!-- <ul class="meta">
                        <li><a href="javascript:void(0);"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                        <li><a href="javascript:void(0);"><i class="zmdi zmdi-label col-amber"></i>Technology</a></li>
                        <li><a href="javascript:void(0);"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                    </ul> -->
                </div>
                <div class="body">
                    <div class="img-post m-b-15">
                        <img src="{{asset('Images/'. $post->image)}}" alt="Awesome Image">
                        <div class="social_share">
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                        </div>
                    </div>
                    <p>{{$post->content}}</p>
                    <a href="{{route('post-details' , ['id' => $post->id])}}" title="read more" class="btn btn-round btn-info">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
</body>
<br><br>
@endsection