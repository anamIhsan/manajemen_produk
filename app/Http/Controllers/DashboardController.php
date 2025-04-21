<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $produk = Produk::all();
        $pesanan = Pesanan::all();

        return view('pages.dashboard.index', compact('users', 'produk', 'pesanan'));
    }
}
