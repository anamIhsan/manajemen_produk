@extends('templates.app')

@section('title')
    Ubah Produk
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ubah Produk</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('produk.update', ['produk' => $dataProduk->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama..." value="{{old('nama') ? old('nama') : $dataProduk->nama}}"/>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5">{{old('nama') ? old('nama') : $dataProduk->deskripsi}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukan Harga..." value="{{old('nama') ? old('nama') : $dataProduk->harga}}"/>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" name="stok" class="form-control" id="stok" placeholder="Masukan Stok..." value="{{old('nama') ? old('nama') : $dataProduk->stok}}"/>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar"/>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="{{route('produk.index')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
