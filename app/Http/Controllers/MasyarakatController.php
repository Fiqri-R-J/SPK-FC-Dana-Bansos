<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function index(Request $request)
    {
        $data['masyarakats'] = \App\Masyarakat::all();
        return view('welcome', $data);
    }
    public function uji(Request $request)
    {
        $data['model'] = new \App\Kriteria();
        $data['form_options'] = [
            'action' => 'DataController@simpan',
            'method' => 'POST',
            'file' => true,
        ];
        $data['btn_submit'] = 'Tambah';

        return view('/ujikriteria', $data);
    }
}
