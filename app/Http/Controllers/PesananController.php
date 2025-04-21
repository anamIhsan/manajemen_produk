<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();

        return view('pages.pesanan.index', compact('pesanan'));
    }

    public function formCreate()
    {
        $produk = Produk::all();
        $user = User::all();
        return view('pages.pesanan.create', compact('produk ', 'user'));
    }
}
