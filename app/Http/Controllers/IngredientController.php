<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Input;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients=Ingredient::all();
        return view('Formularios.Ingredient.index',compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inputs=Input::all();
        return view('Formularios.Ingredient.create',compact('inputs'));
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
            'solido'=>'required|max:50',
            'cantidadKg'=>'required|max:50',
            'liquido'=>'required|max:50',
            'cantidadLiquido'=>'required|max:50',
        ]);
        $ingredient=new Ingredient;
        $ingredient->solido=$request->solido;
        $ingredient->cantidadKg=$request->cantidadKg;
        $ingredient->liquido=$request->liquido;
        $ingredient->cantidadLiquido=$request->cantidadLiquido;
        $ingredient->insumo_id=$request->insumo_id;
        $ingredient->save();
        return redirect()->action([IngredientController::class,'index'])->with('status_success','Ingrediente creado.');
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
        $inputs=Input::all();
        $ingredient=Ingredient::find($id);
        return view('Formularios.Ingredient.update',compact('ingredient','inputs'));
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
        $ingredient=Ingredient::find($id);
        $request->validate([
            'solido'=>'required|max:50'.$ingredient->id,
            'cantidadKg'=>'required|max:50'.$ingredient->id,
            'liquido'=>'required|max:50'.$ingredient->id,
            'cantidadLiquido'=>'required|max:50'.$ingredient->id,
        ]);
        $ingredient->solido=$request->solido;
        $ingredient->cantidadKg=$request->cantidadKg;
        $ingredient->liquido=$request->liquido;
        $ingredient->cantidadLiquido=$request->cantidadLiquido;
        $ingredient->save();

        return redirect()->action([IngredientController::class,'index'])->with('status_success','Ingrediente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient=Ingredient::find($id);
        $ingredient->delete();
        return redirect()->action([IngredientController::class,'index'])->with('status_success','Ingrediente eliminado.');
    }
}
