@extends('layouts.admin.app')

@section('users')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin Users</h1>
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
              <!-- <a href="{{ url('add-role-view') }}"> -->
                <button  type="button" class="btn btn-primary container">create user</button>
            </a>
            </div>
 <!-- /.card-header -->
 <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>user name</th>
        <th>show</th>
        <th>edit</th>
        <th>delete</th>
        
        
      </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td> 
          <!-- <a href="{{ url('show-user' , ['id' => $user->id]) }}"> -->
            <button type="button" class="btn btn-primary">show</button>

          </a>
        </td>
        <td>
        <a href="{{ route('edit-admin-user-view' , ['id' => $user->id]) }}">

            <button type="button" class="btn btn-success">edit</button>
        </td>
        <td>
         

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