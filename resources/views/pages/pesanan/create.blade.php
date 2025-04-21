@extends('templates.app')

@section('title')
    Tambah User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah User</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('user.create')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama..." value="{{old('name')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email..." value="{{old('email')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Tambahkan Alamat..." value="{{old('alamat')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password..." value="{{old('password')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">No Hp</label>
                                <input type="text" accept="image/*" name="no_telepon" class="form-control" id="no_telepon" value="{{old('no_telepon')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" class="form-select">
                                    <option value="" disabled selected>-- Pilih Level --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{route('user.index')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
