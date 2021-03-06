@extends('layout.site')
@section('titulo', 'Lista de Notícias')

@section('conteudo')
    <div class="content">
        <h1 class="">Lista de noticias</h1>
        <div>
            <a class="btn" href="{{ route('admin.noticia.adicionar') }}">Adicionar</a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr class="table-header">
                        <th>Id</th>
                        <th>Título</th>
                        <th>Publicado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->titulo }}</td>
                            <td>{{ $registro->publicado ? "Sim" : "Não" }}</td>
                            <td class="action-cell">
                                <a class="btn" href="{{ route('admin.noticia.editar',$registro->id) }}">Editar</a>
                                <a class="btn btn-danger" href="{{ route('admin.noticia.deletar',$registro->id) }}" onclick="return confirm('Tem certeza que deseja deletar o projeto?');">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection