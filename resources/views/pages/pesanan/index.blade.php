@extends('templates.app')

@section('title')
    Pesanan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Tabel Pesanan</h4>
                        <a href="{{route('pesanan.form-create')}}" class="btn btn-primary">
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
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->produk->nama}}</td>
                                <td>{{$value->produk->harga}}</td>
                                <td>{{$value->jumlah}}</td>
                                <td>{{$value->total_harga}}</td>
                                <td>{{$value->status_pesanan}}</td>
                                <td>
                                    <form action="{{route('pesanan.delete', ['pesanan' => $value->id])}}" method="post">
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
