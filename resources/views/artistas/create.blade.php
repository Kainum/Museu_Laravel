@extends('adminlte::page')

@section('content')
    <h3>Novo Artista</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=>"artistas.store"]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('info', 'Informações:') !!}
            {!! Form::textarea('info', null, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('img', 'Link da Imagem:') !!}
            {!! Form::text('img', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Artista', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop