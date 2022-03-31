@extends('layouts.admin')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-body">
        <h3>Tambah Petugas</h3>
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
        <div class="form-group">
            {{ Form::label('email', 'EMAIL') }}
            {{ Form::email('email',null,['class' => 'form-control']) }}
            @if($model->toArray())
            <small class="form-text text-muted">Abaikan Jika Tidak Ingin Diubah</small>
            <br>
            @endif
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'PASSWORD') }}
            {{ Form::password('password',['class' => 'form-control']) }}
            @if($model->toArray())
            <small class="form-text text-muted">Abaikan Jika Tidak Ingin Diubah</small>
            <br>
            @endif
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        {!! Form::close() !!}
    </div>
</div>

@endsection