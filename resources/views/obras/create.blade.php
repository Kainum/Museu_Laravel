@extends('adminlte::page')

@section('content')
    <h3>Novo Obra</h3>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=>"obras.store"]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('info', 'Informações:') !!}
            {!! Form::textarea('info', null, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('data_conclusao', 'Data da conclusão:') !!}
            {!! Form::date('data_conclusao', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('artista_id', 'Artista:') !!}
            {!! Form::select('artista_id',
                            \App\Artista::orderBy('nome')->pluck('nome', 'id')->toArray(),
                            null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sala_id', 'Sala:') !!}
            {!! Form::select('sala_id',
                            \App\Sala::orderBy('sala')->pluck('sala', 'id')->toArray(),
                            null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('img', 'Link da Imagem:') !!}
            {!! Form::text('img', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Obra', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop