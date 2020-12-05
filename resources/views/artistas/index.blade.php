@extends('layouts.default')

@section('content')
    <h1>Artistas</h1>
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
                        <a href="{{ route('artistas.edit', ['id'=>$artista->id]) }}" class="btn-sm btn-success">Editar</a>
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