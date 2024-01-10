<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('index', compact('users'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
            'alamat' => 'required',
        ]);

        User::create([
            'nama' => enkripsi($request->nama), 'pekerjaan' => enkripsi($request->pekerjaan),
            'alamat' => enkripsi($request->alamat), 'email' => $request->email,
        ]);
        return redirect()->back()->with('success', 'data berhasil disimpan');
    }
}
