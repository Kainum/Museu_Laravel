@extends('adminlte::page')

@section('content')
    <h3>Editando Artista: {{ $artista->nome }} </h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=> ["artistas.update", 'id'=>$artista->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $artista->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('info', 'Informações:') !!}
            {!! Form::textarea('info', $artista->info, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('img', 'Link da Imagem:') !!}
            {!! Form::text('img', $artista->img, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Editar Artista', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop