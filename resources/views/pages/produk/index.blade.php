@extends('templates.app')

@section('title')
    Produk
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Tabel Produk</h4>
                        <a href="{{route('produk.form-create')}}" class="btn btn-primary">
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
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ Storage::url($value->gambar) }}" width="75" height="75">
                                </td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->deskripsi}}</td>
                                <td>Rp. {{$value->harga}}</td>
                                <td>{{$value->stok}}</td>
                                <td>
                                    <a href="{{route('produk.form-update', ['produk' => $value->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{route('produk.delete', ['produk' => $value->id])}}" method="post">
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
