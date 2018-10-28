@extends('templates.template')
@section('title',"Alterar")
@section('header')
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4 offset-lg-4">
    <h2>Upload</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session('mensagem'))
    <div class="alert alert-info">
        {{Session('mensagem')}}
    </div>
    @endif
        <form action="/arquivos/{{$arquivo->id}}" method="post">
        @method('PUT')
            {{csrf_field()}}
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" value="{{$arquivo->descricao}}" name="descricao" id="descricao" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-priamry">Alterar</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@endsection