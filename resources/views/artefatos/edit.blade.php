@extends('adminlte::page')

@section('content')
    <h3>Editando Artefato: {{ $artefato->nome }} </h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=> ["artefatos.update", 'id'=>$artefato->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $artefato->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('info', 'Informações:') !!}
            {!! Form::textarea('info', $artefato->info, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('idade', 'Idade do artefato:') !!}
            {!! Form::number('idade', $artefato->idade, ['min' => '0', 'class' => 'text-right form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sala_id', 'Sala:') !!}
            {!! Form::select('sala_id',
                            \App\Sala::orderBy('sala')->pluck('sala', 'id')->toArray(),
                            $artefato->sala_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('img', 'Link da Imagem:') !!}
            {!! Form::text('img', $artefato->img, ['class'=>'form-control', 'required']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Editar Artefato', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop