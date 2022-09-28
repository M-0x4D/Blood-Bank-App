@extends('layouts.admin.app')



@section('edit-role')
    


<form method="POST" action="{{route('create-city')}}">
  @csrf
    <div class="form-group">
      <label >city name</label>
      <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    
    <select class="form-control" id="governorates" name="governorate_id">
            <option selected disabled hidden value="">المحافظة</option>
            @foreach($governrates as $governrate)
                <option value="{{$governrate->id}}">{{$governrate->name}}</option>
                @endforeach
    </select>
    <br> <br>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection