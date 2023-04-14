<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestLista;
use App\Http\Resources\ListaResource;
use App\Models\Lista;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas =  Lista::all();
        return response()->json(["data" => $listas]);
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
    public function store(RequestLista  $request)
    {
        $lista = Lista::create($request->all());
        return $lista;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::find($id);
        if (!$lista) {
            return response()->json(["error" => '404 Not Found'], 404);
        }
        return new ListaResource($lista);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(RequestLista $request, $id)
    {
        $lista = Lista::find($id);
        if (!$lista) {
            return response()->json(["error" => '404 Not Found'], 404);
        }

        $lista->update($request->all());
        return new ListaResource($lista);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista = Lista::find($id);
        if (!$lista) {
            return response()->json(["error" => '404 Not Found'], 404);
        }

        $lista->delett();
        return response()->json([], 204);
    }
}
