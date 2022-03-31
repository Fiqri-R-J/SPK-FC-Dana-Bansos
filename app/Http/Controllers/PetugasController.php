<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $data['petugas'] = \App\Petugas::all();
        return view('/admin/petugas', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Petugas';
        $data['model'] = new \App\Petugas();
        $data['form_options'] = [
            'action' => 'PetugasController@simpan',
            'method' => 'POST',
            'file' => true,
        ];
        $data['btn_submit'] = 'Tambah';

        return view('/admin/formpetugas', $data);
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = \App\User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'level' => 'Petugas'
        ]);

        $petugas = \App\Petugas::create(['nama' => $request->nama,'rt'=>$request->rt]);
        

        return redirect('/petugas')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }
    public function ubah($id)
    {
        $data['title'] = 'Ubah Petugas';
        $data['model'] = \App\Petugas::findOrFail($id);
        $data['form_options'] = [
            'action' => ['PetugasController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('/admin/formpetugas', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
        ]);

        \App\Petugas::findOrFail($id)->update($request->only('nama','rt'));

        return redirect('/petugas')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id)
    {
        \App\Petugas::findOrFail($id)->delete();
        return redirect('/petugas')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
