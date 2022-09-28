@extends('layouts.admin.app')



@section('edit-role')
    

{{-- {!! Form::model($role_id, ['method' => 'POST','route' => ['edit-role', $role_id]]) !!} --}}

<form method="POST" action="{{route('edit-governrate' )}}">
  @csrf
    <div class="form-group">
      <label >governrate name</label>
      <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role name" >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    

    <input hidden name="governrate_id" value="{{$governrate_id}}" class="form-check-input" id="exampleCheck1">

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection