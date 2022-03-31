@extends('layouts.wellcome')
@section('content')

<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Masyarakat</h3>
        <h6>(Jika anda merasa dapat tapi didata tidak dapat silahkan <a href="/ujikriteria">Klik disini</a>)</h6>
        <hr>
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>RT</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masyarakats as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kk }}</td>
                    <td>{{ $item->rt }}</td>
                    <td>{{ $item->status }}</td>
                    
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