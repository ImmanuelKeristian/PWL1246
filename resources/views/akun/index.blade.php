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
                            <li class="breadcrumb-item"><a href="#">Role</a></li>
                            <li class="breadcrumb-item active">Akun</li>
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
                    </div>
                    <div class="card-body">
                        <table id="table-akun" class="table table-striped">
                            <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($akuns as $akun)
                                <tr>
                                    <td>{{ $akun->id }}</td>
                                    <td>{{ $akun->nama }}</td>
                                    <td>{{ $akun->email }}</td>
                                    <td>{{ $akun->role }}</td>
                                    <td>
                                        <a href="{{route('admin-edit', ['id' => $akun->id])}}" class="btn btn-primary"><i class="fa fa-pen"> Edit</i></a>
                                        <a data-toggle="modal" data-target="#modal-hapus{{$akun->id}}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-hapus{{$akun->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Konfirmasi Hapus</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Tolong konfirmasi untuk penghapusan data {{$akun->nama}}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <form action="{{route('admin-delete', ['id' => $akun->id])}}" method="POST">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{$message}}",
                });
        </script>    
    @endif
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection
