<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::all();

        return view('pages.produk.index', compact('produk'));
    }

    public function formCreate(){
        return view('pages.produk.create');
    }

    public function create(Request $request){
        $validation = Validator::make($request->all(),[
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2024'
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        };

        $image = $request->file('gambar');
        $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();

        try{
            $uploadImage = Storage::putFileAs('public/produk', $image, $fileName);
            Produk::create([
                "nama" => $request->nama,
                "deskripsi" => $request->deskripsi,
                "harga" => $request->harga,
                "stok" => $request->stok,
                "gambar" => $uploadImage
            ]);

            return redirect()->route('produk.index')->with('success', "Berhasil ditambahkan");
        } catch(\Throwable $th){
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        };
    }

    public function formUpdate(Produk $produk){
        $dataProduk = Produk::find($produk->id);
        return view('pages.produk.update', compact('dataProduk'));
    }

    public function update(Request $request, Produk $produk){
        $validation = Validator::make($request->all(),[
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2024'
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        };

        $dataInput = [
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga,
            "stok" => $request->stok,
        ];

        if($request->hasFile('gambar')){
            $image = $request->file('gambar');

            if(Storage::exists($produk->gambar)){
                Storage::delete($produk->gambar);
            }

            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $dataInput['gambar'] = Storage::putFileAs('public/produk', $image, $fileName);
        }

        try{
            Produk::where('id', $produk->id)->update($dataInput);

            return redirect()->route('produk.index')->with('success', "Berhasil diubah");
        } catch(\Throwable $th){
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        };
    }

    public function delete(Produk $produk){
        $dataProduk = Produk::find($produk->id);
        try {
            if(Storage::exists($dataProduk->gambar)){
                Storage::delete($dataProduk->gambar);
            }
            $delete = Produk::destroy($produk->id);
            return redirect()->route('produk.index')->with('success', "Berhasil dihapus");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
