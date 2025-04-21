<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class PesananController extends Controller
{
    function __construct(){
        $this->middleware('checkAuth');
    }

    public function index(Request $request){
        if($request->attributes->get('payload')->get('level') == 'User'){
            $pesanan = Pesanan::where('id_users', $request->attributes->get('payload')->get('sub'))->get();
        }else{
            $pesanan = Pesanan::all();
        }

        return view('pages.pesanan.index', compact('pesanan'));
    }

    public function formCreate(){
        $produk = Produk::all();
        $user = User::all();
        return view('pages.pesanan.create', compact('produk', 'user'));
    }

    public function create(Request $request){
        $validation = Validator::make($request->all(),[
            'id_produk' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        };

        $pesanan = Pesanan::create([
            "id_produk" => $request->id_produk,
            "jumlah" => $request->jumlah,
            "total_harga" => $request->jumlah * Produk::find($request->id_produk)->harga,
            "id_users" => $request->attributes->get('payload')->get('sub'),
            "status" => "unpaid",
        ]);

        if($pesanan){
            return redirect()->route('pesanan.index')->with('success', 'Pesanan Berhasil Dibuat');
        }else{
            return redirect()->back()->with('error', 'Pesanan Gagal Dibuat')->withInput();
        }
    }

    public function delete(Pesanan $pesanan){
        try {
            $delete = Pesanan::destroy($pesanan->id);
            return redirect()->route('pesanan.index')->with('success', "Berhasil dihapus");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
