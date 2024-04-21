@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Akun</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Akun</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="card-header">
            <h3 class="card-title">Data Akun</h3>
          </div>
          <table id="table-akun" class="table table-striped">
              @foreach($akuns as $akun)
              <tr>
                  <td>{{ $akun->id }}</td>
                  <td>{{ $akun->nama }}</td>
                  <td>{{ $akun->email }}</td>
              </tr>
              @endforeach
          </table>
        <form action="{{route('admin-update', ['id' => $akun->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <form>
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <input type="string" name="role" class="form-control" placeholder="Admin/Student/Prodi">
                        @error('role')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection
