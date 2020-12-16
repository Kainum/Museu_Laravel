@extends('layouts.default')

@section('content')
    <h1>Artistas</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'artistas']) !!}
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
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($artistas as $artista)
                <tr>
                    <td>{{ $artista->nome }}</td>
                    <td>
                        <a href="{{ route('artistas.edit', ['id'=>\Crypt::encrypt($artista->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$artista->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $artistas->links() }}

    <a href="{{ route('artistas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"artistas"
@endsection