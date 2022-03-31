@extends('layouts.wellcome')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Uji Kriteria</h3>
        <hr>
        <div class="form-group">
            {{ Form::label('nama', 'Nama') }}
            {{ Form::text('nama',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('rt', 'RT') }}
            {{ Form::text('rt',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('rt') }}</span>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kriteria</h4>
                @foreach(\App\Kriteria::all() as $item)
                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="kriteria[]" id="" value="1">
                    {{$item->nama}}
                </label>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" id="hasil">
          Tampilkan
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hasil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input type="text"
                            class="form-control" name="hasil_nama" id="" aria-describedby="helpId" placeholder="" readonly>
                   
                        </div>
                        <div class="form-group">
                            <label for="">RT</label>
                            <input type="text"
                              class="form-control" name="hasil_rt" id="" aria-describedby="helpId" placeholder="" readonly>
                         
                          </div>
                          <div class="card">
                              <div class="card-body">
                                  <div class="card-title text-center" style="font-size: 20px; font-weight: bold" id="hasil_text"></div>
                              </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

@php
    $keputusan = \App\Keputusan::first();
@endphp

@section('script')
<script>
    var keputusan = {{ $keputusan->syarat }};
    $('#hasil').click(function(){
        
        var nama = $('input[name=nama]').val();
        var rt = $('input[name=rt]').val();
        var checked = $('input:checkbox:checked').length;

        $('input[name=hasil_nama]').val(nama);
        $('input[name=hasil_rt]').val(rt);

        if(checked >= keputusan){
            $('#hasil_text').html('Dapat');
        }else {
            $('#hasil_text').html('Tidak Dapat');
        }
        

        $('#modelId').modal('show');
    });
</script>
@endsection