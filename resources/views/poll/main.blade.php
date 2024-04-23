@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hasil Polling</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Polling</a></li>
                            <li class="breadcrumb-item active">Hasil Polling</li>
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
                                <th>ID User</th>
                                <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    <td>
                                    @foreach($users as $user)
                                        @if($user->id == $form->idUser)
                                            <ul><li>{{ $user->id }}|{{ $user->nama }}</li></ul>
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>{{ $form->created_at }}</td>
                                    </tr>
                                @endforeach
                                <tr><a href="{{route('pol-index')}}" class="btn btn-primary"><i class=""> Back</i></a></tr>
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
