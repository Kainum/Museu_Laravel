@extends('adminlte::page')

@section('content')
    <h3>Editando Sala: {{ $sala->nome }} </h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=> ["salas.update", 'id'=>$sala->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('sala', 'Nome da sala:') !!}
            {!! Form::text('sala', $sala->sala, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::textarea('descricao', $sala->descricao, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Sala', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop