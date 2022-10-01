@extends('layouts.admin.app')



@section('edit-role')
    


<form method="POST" action="{{route('edit-admin-user' )}}">
  @csrf
    <div class="form-group">
      <label >Admin name</label>
      <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Admin  name" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    

    <input hidden name="user_id" value="{{$user_id}}" class="form-check-input" id="exampleCheck1">

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection