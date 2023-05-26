<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequestLista;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Resources\ItemListaResource;
use App\Models\ItemLista;
use App\Models\Lista;
use Illuminate\Http\Request;

class ItemListaController extends Controller
{
    private $item;
    public function __construct(ItemLista $item)
    {
        $this->item = $item;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $lista = Lista::find($id);
        if (!$lista) {
            return response()->json(["error" => '404 Not Found'], 404);
        }
        $itens = $lista->itens;
        return response()->json(["data" => $itens], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequestLista $request)
    {
        $item = $this->item->create($request->all());
        return new ItemListaResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemLista  $itemLista
     * @return \Illuminate\Http\Response
     */
    public function show($listaId, $id)
    {
        $item = $this->item->where('id', $id)->where('lista_id', $listaId)->get();
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemLista  $itemLista
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request)
    {
        $item = $this->item->find($request->id);

        if (!$item) {
            return response()->json(["error" => '404 Not Found'], 404);
        }

        $item->update([
            "name" => $request->name,
            "quantidade" => $request->quantidade,
            "preco" => $request->preco,
            "comprado" => $request->comprado,
        ]);
        return new ItemListaResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemLista  $itemLista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->item->find($id);
        if (!$item) {
            return response()->json(["error" => '404 Not Found'], 404);
        }

        $item->delete();
        return response()->json([], 204);
    }
}
