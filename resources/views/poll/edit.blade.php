@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Polling Kuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Polling Kuliah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{route('pol-update', ['id' => $pols->idhasilPolling])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Poll</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Id course</label>
                        <input type="string" name="codecourse" value="{{ $pols->idCourse }}" class="form-control" placeholder="Enter code">
                        @error('codecourse')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nama Matkul</label>
                        <input type="string" name="namacourse" value="{{ $pols->nameCourse }}" class="form-control" placeholder="Enter Matkul">
                        @error('namacourse')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">SKS</label>
                        <input type="string" name="sks" value="{{ $pols->sks }}" class="form-control" placeholder="Enter sks">
                        @error('sks')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="string" name="statuscourse" value="{{ $pols->statusCourse }}" class="form-control" placeholder="Open/Close">
                        @error('statuscourse')
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
