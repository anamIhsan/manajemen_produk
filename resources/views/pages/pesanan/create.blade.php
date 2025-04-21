@extends('templates.app')

@section('title')
    Tambah Pesanan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Pesanan</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('pesanan.create')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="produk" class="form-label">Produk</label>
                                <select name="id_produk" class="form-select">
                                    <option value="" disabled selected>-- Pilih Produk --</option>
                                    @forelse ($produk as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @empty
                                        <option value="" disabled>Produk tidak tersedia</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Masukan Jumlah..." value="{{old('jumlah')}}"/>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="{{route('pesanan.index')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
