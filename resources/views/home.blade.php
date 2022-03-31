@extends('layouts.admin')
@section('content')
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Data Masyarakat</h3>
        <hr>
        @if (auth()->user()->level=="Petugas")
        <div>
            <a name="" id="" class="btn btn-primary" href="{{ url('data/tambah') }}" role="button">Tambah</a>
        </div>
        @endif
        <br>
        <table class="table table-striped table-bordered" id="tabel-1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>RT</th>
                    <th>STATUS</th>
                    @if (auth()->user()->level=="Petugas")
                    <th>AKSI</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($masyarakats as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kk }}</td>
                    <td>{{ $item->rt }}</td>
                    <td>{{ $item->status }}</td>
                    @if (auth()->user()->level=="Petugas")
                    <td>
                        <!-- Button trigger modal -->
                        <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#model-{{ $item->id }}">
                          Kriteria
                        </button>
                        
                        <!-- Modal -->
                        <!--<div class="modal fade" id="model-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kriteria</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                $kriteria = \App\Kriteria::all();
                                                @endphp
                                                @foreach ($kriteria as $item2)
                                                    @php 
                                                        $kriteria_masyarakat = \App\KriteriaMasyarakat::where('masyarakat_id', $item->id)->where('kriteria_id', $item2->id)->first();
                                                    @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item2->nama }}</td>
                                                    <td>{{ $kriteria_masyarakat ? 'Terpenuhi' : 'Tidak Terpenuhi' }}</td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus {{ $item->nama }}')"    
                            href="{{ url('data/'. $item->id .'/hapus') }}"
                            role="button">Hapus</a>
                        <a class="btn btn-info btn-sm" href="{{ url('data/'. $item->id .'/ubah') }}"
                            role="button">Ubah</a>
                    </td>
                    @endif
                    
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