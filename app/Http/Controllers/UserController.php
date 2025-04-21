<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        $user = User::all();

        return view('pages.user.index', compact('user'));
    }

    public function formCreate(){
        return view('pages.user.create');
    }

    public function create(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'no_telepon' => 'required|unique:users',
            'level' => 'required|in:,Admin,User',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        try {
            User::create([
                "name" => $data['name'],
                "email" => $data['email'],
                "password" => $data['password'],
                "alamat" => $data['alamat'],
                "no_telepon" => $data['no_telepon'],
                "level" => $data['level'],
            ]);
            return redirect()->route('user.index')->with('success', "Berhasil ditambahkan");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function formUpdate(User $user){
        $dataUser = User::find($user->id);
        return view('pages.user.update', compact('dataUser'));
    }

    public function update(Request $request, User $user){
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore($user->id), // validasi email unique, kecuali email milik user ini
            ],
            'password' => 'nullable|min:6',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'level' => 'required|in:Admin,User',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $dataInput = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'level' => $request->level,
        ];

        // Jika password diisi, hash dan masukkan ke $dataInput
        if ($request->filled('password')) {
            $dataInput['password'] = Hash::make($request->password);
        }

        try {
            User::where('id', $user->id)->update($dataInput);
            return redirect()->route('user.index')->with('success', "Berhasil diubah");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function delete(User $user){
        try {
            $delete = User::destroy($user->id);
            return redirect()->route('user.index')->with('success', "Berhasil dihapus");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
