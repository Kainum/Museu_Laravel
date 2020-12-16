@extends('layouts.default')

@section('content')
    <h1>Eventos</h1>

    <table class="table table-strip table-bordered table-hover">
        <thead>
            <th>Evento</th>
            <th>Data do Evento</th>
            <th>Salas do Evento</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->nome_evento }}</td>
                    <td>{{ Carbon\Carbon::parse($evento->dt_inicio)->format('d/m/Y') }}</td>
                    <td>
                        @foreach ($evento->salas as $a)
                            <li>{{ $a->sala->sala }}</li>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('eventos.edit', ['id'=>$evento->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$evento->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('eventos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"atores"
@endsection