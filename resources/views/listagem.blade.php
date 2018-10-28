@extends('templates.template')
@section('title',"Listagem")
@section('header')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">

    @if(Session('mensagem'))
    <div class="alert alert-info">
        {{Session('mensagem')}}
    </div>
    @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Dt. Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($arquivos as $a)
            <tr>
                <td>{{$a->descricao}}</td>
                <td>{{$a->created_at->format('d/m/Y')}}</td>
                <td>
                <a href="/arquivos/{{$a->id}}/edit" class="btn btn-sm btn-danger">Alterar</a>
                <form action="/arquivos/{{$a->id}}" method="POST">
                {{csrf_field()}}
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>                
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>

@endsection