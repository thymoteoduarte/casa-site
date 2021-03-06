@extends('layout.site')
@section('titulo', 'Editar notícia')

@section('conteudo')
<div class="content">
    <div class="form-title">
        <h1>Editar notícia</h1>
    </div>
    <div class="form">
        <form action="{{ route('admin.noticia.atualizar', $registro->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.noticias._form')
            <div class="input-btn">
                <button class="btn">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection