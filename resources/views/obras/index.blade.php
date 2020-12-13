@extends('layouts.default')

@section('content')
    <h1>Obras</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'obras']) !!}
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
            <th>Artista</th>
            <th>Ano</th>
            <th>Sala</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($obras as $obra)
                <tr>
                    <td>{{ $obra->nome }}</td>
                    <td>{{ $obra->artista->nome }}</td>
                    <td>{{ $obra->data_conclusao }}</td>
                    <td>{{ $obra->sala->sala }}</td>
                    <td>
                        <a href="{{ route('obras.edit', ['id'=>$obra->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$obra->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $obras->links() }}

    <a href="{{ route('obras.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"obras"
@endsection