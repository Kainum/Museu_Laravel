@extends('layouts.default')

@section('content')
    <h1>Artefatos</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'artefatos']) !!}
        <div class="sidebar-form">
            <div class="input-group">
                <input type="text" name="desc_filtro" style="width:80% !important;" placeholder="Pesquisa...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    {!! Form::close() !!}
    <br>
    
    <table class="table table-strip table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Idade</th>
            <th>Sala</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($artefatos as $artefato)
                <tr>
                    <td>{{ $artefato->nome }}</td>
                    <td>{{ $artefato->idade }}</td>
                    <td>{{ $artefato->sala->sala }}</td>
                    <td>
                        <a href="{{ route('artefatos.edit', ['id'=>$artefato->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$artefato->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $artefatos->links() }}

    <a href="{{ route('artefatos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"artefatos"
@endsection