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
                            <li class="breadcrumb-item">Ikut</li>
                            <li class="breadcrumb-item active">Polling Kuliah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ikut Poll</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('for-store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <table id="table-akun" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Matkul</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td name='idpollingHasil'>{{ $pols->idpollingHasil }}</td>
                                <td>
                                    @foreach($courses as $course)
                                        @if($course->statusCourse == 'Open')
                                            <input class="form-check-input" type="checkbox" name="idcourse[]" id="course{{ $course->idCourse }}" value="{{ $course->idCourse }}">
                                            <label class="form-check-label" for="course{{ $course->idCourse }}">{{ $course->nameCourse }}</label><br>
                                        @endif
                                    @endforeach
                                    @error('idcourse')
                                    <small>{{ $message }}</small>
                                    @enderror
                                </td>
                                <td>
                                    @foreach($courses as $course)
                                        @if($course->statusCourse == 'Open')
                                            <label class="form-check-label" for="course{{ $course->sks }}">{{ $course->sks }}</label><br>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if(Auth::user()->role == 'Student')
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </div>
            </form>
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection
