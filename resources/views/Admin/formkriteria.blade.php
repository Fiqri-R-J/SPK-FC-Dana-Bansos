@extends('layouts.admin')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>{{ $title }}</h3>
        <hr>
        {{ Form::model($model, $form_options) }}
        <div class="form-group">
            {{ Form::label('kode', 'Kode') }}
            {{ Form::text('kode',null,['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('kode') }}</span>
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