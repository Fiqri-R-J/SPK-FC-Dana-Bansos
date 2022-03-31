<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $data['kriterias'] = \App\Kriteria::all();
        return view('/admin/kriteria', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kriteria';
        $data['model'] = new \App\Kriteria();
        $data['form_options'] = [
            'action' => 'KriteriaController@simpan',
            'method' => 'POST',
            'file' => true,
        ];
        $data['btn_submit'] = 'Tambah';

        return view('/admin/formkriteria', $data);
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            
        ]);

        \App\Kriteria::create($request->all());

        return redirect('/kriteria')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }
    public function ubah($id)
    {
        $data['title'] = 'Ubah Kriteria';
        $data['model'] = \App\Kriteria::findOrFail($id);
        $data['form_options'] = [
            'action' => ['KriteriaController@update', $id],
            'method' => 'PUT',
        ];
        $data['btn_submit'] = 'Ubah';

        return view('/admin/formkriteria', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        \App\Kriteria::findOrFail($id)->update($request->all());

        return redirect('/kriteria')->with(['type' => 'success','pesan' => 'berhasil mengubah data!']);
    }

    public function hapus($id)
    {
        \App\Kriteria::findOrFail($id)->delete();
        return redirect('/kriteria')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
