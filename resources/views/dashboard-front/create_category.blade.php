@extends('layouts.admin.app')



@section('edit-role')
    


<form method="POST" action="{{route('create-category')}}">
  @csrf
    <div class="form-group">
      <label >category name</label>
      <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection