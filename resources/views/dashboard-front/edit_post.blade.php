@extends('layouts.admin.app')



@section('edit-role')
    


<form method="POST" action="{{route('edit-post' )}}">
  @csrf
    <div class="form-group">
      <label >Post name</label>
      <input name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter post title" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    

    <input hidden name="post_id" value="{{$post_id}}" class="form-check-input" id="exampleCheck1">

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection