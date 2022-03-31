<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeputusanController extends Controller
{
    public function index(Request $request)
    {
        $data['keputusans'] = \App\Keputusan::all();
        return view('/admin/keputusan', $data);
    }
    public function tambah()
    {
        $data['model'] = new \App\Kriteria();
        $data['form_options'] = [
            'action' => 'KeputusanController@simpan',
            'method' => 'POST',
            'file' => true,
        ];
        $data['btn_submit'] = 'Tambah';

        return view('/admin/formkeputusan', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'syarat' => 'required',
            'nama' => 'required',
            
        ]);

        \App\Keputusan::create($request->all());

        return redirect('/keputusan')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }

    public function ubah($id)
    {
        $data['model'] = \App\Keputusan::findOrFail($id);
        $data['form_options'] = [
            'action' => ['KeputusanController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('/admin/formkeputusan', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'syarat' => 'required',
            'nama' => 'required',
        ]);

        \App\Keputusan::findOrFail($id)->update($request->all());

        return redirect('/keputusan')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }
    public function hapus($id)
    {
        \App\Keputusan::findOrFail($id)->delete();
        return redirect('/keputusan')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
