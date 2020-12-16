@extends('layouts.default')

@section('content')
    <h1>Salas</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'salas']) !!}
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
            <th>Sala</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($salas as $sala)
                <tr>
                    <td>{{ $sala->sala }}</td>
                    <td>{{ $sala->descricao }}</td>
                    <td>
                        <a href="{{ route('salas.edit', ['id'=>\Crypt::encrypt($sala->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$sala->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $salas->links() }}

    <a href="{{ route('salas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"salas"
@endsection