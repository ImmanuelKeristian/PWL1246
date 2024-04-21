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
                            <li class="breadcrumb-item"><a href="#">Tambah</a></li>
                            <li class="breadcrumb-item active">Polling Kuliah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{route('pol-store')}}" method="POST">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Poll</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="int" name="idpollinghasil" class="form-control" id="exampleInputEmail1" placeholder="Enter id">
                        @error('idpollinghasil')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="idCourse">Select Courses</label><br>
                        <div class="form-check form-check-inline">
                        @foreach($courses as $course)
                            <ul><input class="form-check-input" type="checkbox" name="idcourse[]" id="course{{ $course->idCourse }}" value="{{ $course->idCourse }}">
                            <label class="form-check-label" for="course{{ $course->idCourse }}">{{ $course->nameCourse }}</label><br>
                            </ul>
                        @endforeach
                        </div>
                        @error('idcourse')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Poll</label>
                        <input type="date" name="start" class="form-control" id="exampleInputPassword1" placeholder="Enter start">
                        @error('start')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">End Poll</label>
                        <input type="date" name="end" class="form-control" id="exampleInputPassword1" placeholder="Enter end">
                        @error('end')
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
