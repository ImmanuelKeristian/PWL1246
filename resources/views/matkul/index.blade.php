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
                    @if(Auth::user()->role == 'Prodi')
                    <div class="card-header">
                        <a href="{{ route('mat-create') }}" role="button" class="btn btn-success">Tambah Akun</a>
                    </div>
                    @endif
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
                            @foreach($matkul as $mat)
                                <tr>
                                    <td>{{ $mat->idCourse }}</td>
                                    <td>{{ $mat->codeCourse }}</td>
                                    <td>{{ $mat->nameCourse }}</td>
                                    <td>{{ $mat->sks}}</td>
                                    <td>{{ $mat->statusCourse }}</td>
                                    @if(Auth::user()->role == 'Prodi')
                                    <td>
                                        <a href="{{route('mat-edit', ['id' => $mat->idCourse])}}" class="btn btn-primary"><i class="fa fa-pen"> Edit</i></a>
                                        <a data-toggle="modal" data-target="#modal-hapus{{$mat->idCourse}}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                    </td>
                                    @endif
                                </tr>
                                <div class="modal fade" id="modal-hapus{{$mat->idCourse}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Konfirmasi Hapus</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Tolong konfirmasi untuk penghapusan data {{$mat->nameCourse}}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <form action="{{route('mat-delete', ['id' => $mat->idCourse])}}" method="POST">
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
