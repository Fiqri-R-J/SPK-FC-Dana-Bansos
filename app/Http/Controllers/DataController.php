<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $data['masyarakats'] = \App\Masyarakat::all()->sortBy('rt');
        return view('home', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Masyarakat';
        $data['model'] = new \App\Masyarakat();
        $data['form_options'] = [
            'action' => 'DataController@simpan',
            'method' => 'POST',
            'file' => true,
        ];
        $data['btn_submit'] = 'Tambah';

        return view('/petugas/formmasyarakat', $data);
    }
    public function simpan(Request $request)
    {
        
        $total_kriteria = count($request->kriteria);

        $status = 'Tidak Dapat';

        $keputusan = \App\Keputusan::first();

        if($total_kriteria >= $keputusan->syarat){
            $status = 'Dapat';
        }

        

        $data = [
            'nama_kk' => $request->nama,
            'rt' => $request->rt,
            'status' => $status,
        ];

        $masyarakat = \App\Masyarakat::create($data);
        foreach($request->kriteria as $item){
            \App\KriteriaMasyarakat::create([
                'masyarakat_id' => $masyarakat->id,
                'kriteria_id' => $item,
            ]);
        }

        return redirect('home')->with(['type' => 'success','pesan' => 'berhasil menambah data!']);
    }
    public function ubah($id)
    {
        $data['title'] = 'Ubah Masyarakat';
        $data['model'] = \App\Masyarakat::findOrFail($id);
        $data['form_options'] = [
            'action' => ['DataController@update', $id],
            'method' => 'PUT',
            'file' => true,
        ];
        $data['btn_submit'] = 'Ubah';

        return view('/petugas/formmasyarakat', $data);
    }
    public function update(Request $request, $id)
    {
        $total_kriteria = count($request->kriteria);

        $status = 'Tidak Dapat';

        $keputusan = \App\Keputusan::first();

        if($total_kriteria >= $keputusan->syarat){
            $status = 'Dapat';
        }

        $data = [
            'nama_kk' => $request->nama,
            'rt' => $request->rt,
            'status' => $status,
        ];

        \App\Masyarakat::findOrFail($id)->update($data);
        return redirect('home')->with(['type' => 'success','pesan' => 'berhasil merubah data!']);
    }

    public function hapus($id)
    {
        \App\Masyarakat::findOrFail($id)->delete();
        return redirect('/home')->with(['type' => 'success','pesan' => 'berhasil menghapus data!']);
    }
}
