@extends('layouts.admin.app')

@section('users')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>governrates</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ route('create-governrate-view') }}">
                <button  type="button" class="btn btn-primary container">create governrate</button>
            </a>
            </div>
 <!-- /.card-header -->
 <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>governrate name</th>
        <th>show</th>
        <th>edit</th>
        <th>delete</th>
        
        
      </tr>
      </thead>
      <tbody>
      @foreach ($governrates as $governrate)
      <tr>
        <td>{{$governrate->name}}</td>
        <td> 
          <a href="{{ url('show-user' , ['id' => $governrate->id]) }}">
            <button type="button" class="btn btn-primary">show</button>

          </a>
        </td>
        <td>
        <a href="{{ route('edit-governrate-view' , ['id' => $governrate->id]) }}">
            <button type="button" class="btn btn-success">edit</button>
        </td>
        <td>
        <a href="{{ route('delete-governrate' , ['id' => $governrate->id]) }}">

            <button type="button" class="btn btn-danger">delete</button>

          </a>
        </td>
        
       
      </tr>
      @endforeach
      
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>

@endsection