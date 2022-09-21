@extends('layouts.admin.app')



@section('edit-role')
    

{{-- {!! Form::model($role_id, ['method' => 'POST','route' => ['edit-role', $role_id]]) !!} --}}

<form method="POST" action="{{url('edit-role' , ['id' => $role_id])}}">
  @csrf
    <div class="form-group">
      <label >Role name</label>
      <input name="role_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label >Guard name</label>
      <input name="guard_name"  class="form-control" id="exampleInputPassword1" placeholder="Enter guard name">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>


   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection


