@extends('adminlte::page')

@section('content')
    <h3>Nova Sala</h3>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=>"salas.store"]) !!}

        <div class="form-group">
            {!! Form::label('sala', 'Nome da sala:') !!}
            {!! Form::text('sala', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Sala', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop