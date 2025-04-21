@extends('templates.app')

@section('title')
    Ubah User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ubah User</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('user.update', ['user' => $dataUser->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama..." value="{{old('name') ? old('name') : $dataUser->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email..." value="{{old('email') ? old('email') : $dataUser->email}}"/>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Tambahkan Alamat...">{{old('alamat') ? old('alamat') : $dataUser->alamat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password..."/>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">No Hp</label>
                                <input type="text" accept="image/*" name="no_telepon" class="form-control" id="no_telepon" value="{{old('no_telepon') ? old('no_telepon') : $dataUser->no_telepon}}"/>
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" class="form-select">
                                    <option value="" disabled selected>-- Pilih Level --</option>
                                    <option value="Admin" {{ old('level', $dataUser->level ?? '') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ old('level', $dataUser->level ?? '') == 'User' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="{{route('user.index')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
