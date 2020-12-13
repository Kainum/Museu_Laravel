@extends('adminlte::page')

@section('content')
    <h3>Editando Obra: {{ $obra->nome }} </h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=> ["obras.update", 'id'=>$obra->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $obra->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('info', 'Informações:') !!}
            {!! Form::textarea('info', $obra->info, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('data_conclusao', 'Data da conclusão:') !!}
            {!! Form::date('data_conclusao', $obra->data_conclusao, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('artista_id', 'Artista:') !!}
            {!! Form::select('artista_id',
                            \App\Artista::orderBy('nome')->pluck('nome', 'id')->toArray(),
                            $obra->artista_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sala_id', 'Sala:') !!}
            {!! Form::select('sala_id',
                            \App\Sala::orderBy('sala')->pluck('sala', 'id')->toArray(),
                            $obra->sala_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('img', 'Link da Imagem:') !!}
            {!! Form::text('img', $obra->img, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Editar Obra', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop