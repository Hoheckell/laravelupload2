<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arquivos;
use Validation;
use Storage;

class ArquivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            $ext = $request->file('arquivo')->getClientOriginalExtension();
            $arquivo = new Arquivos();
            $arquivo->descricao = $request->descricao;
            $arquivo->url = $request->file('arquivo')->storeAs('imagens','arquivo.'.$ext,'local');
            $arquivo->save();
            
            $msg = "Arquivo enviado com sucesso";

        }

        return redirect()->back()->with('mensagem',$msg);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
