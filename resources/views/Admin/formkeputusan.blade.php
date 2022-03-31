@extends('layouts.admin')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Kriteria</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('syarat', 'SYARAT') }}
            {{ Form::text('syarat',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('syarat') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('nama', 'Nama') }}
            {{ Form::text('nama',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection