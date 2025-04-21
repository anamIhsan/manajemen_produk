@extends('templates.app')

@section('title')
    Tambah Produk
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Produk</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('produk.create')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama..." value="{{old('nama')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Tambahkan Deskripsi..." value="{{old('deskripsi')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukan Harga..." value="{{old('harga')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" name="stok" class="form-control" id="stok" placeholder="Masukan Stok..." value="{{old('stok')}}"/>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar"/>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{route('produk.index')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
