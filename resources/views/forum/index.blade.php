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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Polling Kuliah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <table id="table-akun" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Matkul</th>
                                <th>Nama Matkul</th>
                                <th>Total Polling</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pols as $pol)
                                <tr>
                                    <td>{{ $pol->idpollingHasil }}</td>
                                    <td>
                                    @foreach($courses as $course)
                                        @if($course->statusCourse == 'Open')
                                            <ul><li>{{ $course->codeCourse }}</li></ul>
                                        @endif
                                    @endforeach
                                    </td>

                                    <td>
                                    @foreach($courses as $course)
                                        @if($course->statusCourse == 'Open')
                                        <ul><li>{{ $course->nameCourse }}</li></ul>
                                        @endif
                                    @endforeach
                                    </td>

                                    <td>{{ $pol->totalPolling }}</td>
                                    <td>{{ $pol->start_poll}}</td>
                                    <td>{{ $pol->end_poll }}</td>
                                    <td>{{ $pol->statusPoll }}</td>
                                    <td>
                                        @if($pol->statusPoll == 'Open')
                                            <a href="{{route('for-create', ['id' => $pol->idpollingHasil])}}" role="button" class="btn btn-primary">Ikut Poll</a>
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection
