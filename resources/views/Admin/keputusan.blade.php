@extends('layouts.admin')
@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Keputusan</h3>
        <hr>
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ url('keputusan/tambah') }}" role="button">Tambah</a>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>SYARAT</th>
                    <th>NAMA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keputusans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->syarat }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $item->syarat }}')"    href="{{ url('keputusan/'. $item->id .'/hapus') }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url('keputusan/'. $item->id .'/ubah') }}"
                            role="button">Ubah</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tabel-1').DataTable();
    });
</script>
@endsection