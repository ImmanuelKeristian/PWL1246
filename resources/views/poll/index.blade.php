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
                    <div class="card-header">
                        <a href="{{ route('pol-create') }}" role="button" class="btn btn-success">Tambah Poll</a>
                    </div>
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
                                        @if(Auth::user()->role == 'Prodi')
                                        <td>
                                            <a href="{{route('pol-edit', ['id' => $pol->idpollingHasil])}}" class="btn btn-primary"><i class="fa fa-pen"> Edit</i></a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{$pol->idpollingHasil}}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                            <a href="{{route('pol-main', ['id' => $pol->idpollingHasil])}}" class="btn btn-primary"><i class=""> Rekap</i></a>
                                        </td>
                                        @endif
                                    </tr>
                                    <div class="modal fade" id="modal-hapus{{$pol->idpollingHasil}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Konfirmasi Hapus</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>Tolong konfirmasi untuk penghapusan data Polling ke-{{$pol->idpollingHasil}}</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <form action="{{route('pol-delete', ['id' => $pol->idpollingHasil])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus Data</button>
                                                </form>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
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
