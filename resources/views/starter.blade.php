@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mata Kuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mata Kuliah</li>
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
                        <a href="{{ route('pol-create') }}" role="button" class="btn btn-success">Tambah Akun</a>
                    </div>
                    <div class="card-body">
                        <table id="table-akun" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pols as $pol)
                                <tr>
                                    <td>{{ $pol->idCourse }}</td>
                                    <td>{{ $pol->codeCourse }}</td>
                                    <td>{{ $pol->nameCourse }}</td>
                                    <td>{{ $pol->sks}}</td>
                                    <td>{{ $pol->statusCourse }}</td>
                                    <td>
                                        <a href="{{route('pol-edit', ['id' => $pol->idCourse])}}" class="btn btn-primary"><i class="fa fa-pen"> Edit</i></a>
                                        <a data-toggle="modal" data-target="#modal-hapus{{$pol->idCourse}}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-hapus{{$pol->idCourse}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Konfirmasi Hapus</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Tolong konfirmasi untuk penghapusan data {{$pol->nameCourse}}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <form action="{{route('pol-delete', ['id' => $pol->idCourse])}}" method="POST">
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
