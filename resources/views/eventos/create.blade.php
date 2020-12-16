@extends('adminlte::page')

@section('content')
    <h3>Novo Eventos</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=>"eventos.store"]) !!}

        <div class="form-group">
            {!! Form::label('nome_evento', 'Nome do Evento:') !!}
            {!! Form::text('nome_evento', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dt_inicio', 'Data de Início:') !!}
            {!! Form::date('dt_inicio', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dt_fim', 'Data de Encerramento:') !!}
            {!! Form::date('dt_fim', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dt_lmt_inscricao', 'Data Limite da Inscrição:') !!}
            {!! Form::date('dt_lmt_inscricao', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('info', 'Informações:') !!}
            {!! Form::textarea('info', null, ['class' => 'form-control', 'rows' => 8, 'required']) !!}
        </div>

        <h4>Salas do Evento</h4>
        <div class="input_field_wrap"></div>
        <br>

        <button type="button" style="float:right;" class="add_field_button btn btn-default">Adicionar Sala</button>
        <br>
        <hr/>

        <div class="form-group">
            {!! Form::submit('Criar Evento', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var wrapper = $(".input_field_wrap");
            var add_button = $(".add_field_button");
            var x = 0;
            $(add_button).click(function(e) {
                x++;
                var newField = '<div><div style="width:94%, float:left;" id="ator">{!! Form::select("salas[]", \App\Sala::orderBy("sala")->pluck("sala", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione uma sala"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });
    </script>
@stop