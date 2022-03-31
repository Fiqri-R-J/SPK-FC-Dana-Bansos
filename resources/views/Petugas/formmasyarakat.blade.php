@extends('layouts.admin')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>{{$title}}</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
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
                    <input type="checkbox" class="form-check-input" name="kriteria[]" id="" value="{{ $item->id }}">
                    {{$item->nama}}
                </label>
                </div>
                @endforeach
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection