<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arquivos;
use Validation;
use Storage;
use App\Providers\Util;

class ArquivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['arquivos'] = Arquivos::all();
       return view('listagem',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'arquivo' => 'required|mimes:jpeg,jpg,bmp,png,gif',
            'descricao' => 'required',
        ]);
        $msg = "Não foi possível enviar o arquivo";

        if($request->file('arquivo')->isValid()){
            $util = new Util();
            $ext = $request->file('arquivo')->getClientOriginalExtension();
            $arquivo = new Arquivos();
            $arquivo->descricao = $request->descricao;
            $arquivo->url = $request->file('arquivo')->storeAs('imagens',$util->RandomString(5).".".$ext,'local');
            $arquivo->save();
            
            $msg = "Arquivo enviado com sucesso";

        }

        return redirect()->route('lista')->with('mensagem',$msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arquivo = Arquivos::find($id);
        $data['arquivo'] = $arquivo;
        return view('edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $msg = "Erro ao alterar o arquivo";
        $arquivo = Arquivos::find($id);
        $arquivo->descricao = $request->descricao;
        if($arquivo->save()){
            $msg = "Arquivo alterado com sucesso";
        }
        return redirect()->route('lista')->with('mensagem',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = "Erro ao excluir o arquivo";
        $arq = Arquivos::find($id);
        $url = $arq->url;
        if(Arquivos::destroy($id)){
            Storage::disk('local')->delete($url);
            $msg = "Arquivo excluido com sucesso";
        }
        return redirect()->route('lista')->with('mensagem',$msg);
    }
}
