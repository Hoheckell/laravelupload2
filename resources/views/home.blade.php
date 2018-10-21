@extends('templates.template')
@section('title',"Home")
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
        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="arquivo">Arquivo:</label>
                <input type="file" name="arquivo" id="arquivo" class="form-control">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-priamry">Enviar</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@endsection