@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Akun</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Tambah</li>
                            <li class="breadcrumb-item active">Data Akun</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{route('admin-store')}}" method="POST">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Akun</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="int" name="id" class="form-control" id="exampleInputEmail1" placeholder="Enter id">
                        @error('id')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="string" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Enter nama">
                        @error('nama')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <input type="string" name="role" class="form-control" id="exampleInputPassword1" placeholder="Admin/Student/Prodi">
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
