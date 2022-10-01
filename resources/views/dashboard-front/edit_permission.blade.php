@extends('layouts.admin.app')



@section('edit-role')
    


<form method="POST" action="{{route('edit-permission' )}}">
  @csrf
    <div class="form-group">
      <label >User name</label>
      <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter permission name" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    

    <input hidden name="permission_id" value="{{$permission_id}}" class="form-check-input" id="exampleCheck1">

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection