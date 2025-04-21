@extends('templates.app')

@section('title')
    Pengguna
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Tabel Pengguna</h4>
                        <a href="{{route('user.form-create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->alamat}}</td>
                                <td>{{$value->no_telepon}}</td>
                                <td>{{$value->level}}</td>
                                <td>
                                    <a href="{{route('user.form-update', ['user' => $value->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{route('user.delete', ['user' => $value->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
