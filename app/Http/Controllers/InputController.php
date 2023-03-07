<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Input;
use App\Models\Ingredient;
use App\Models\Property;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs=Input::all();
        return view('Formularios.Input.index',compact('inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties=Property::all();
        return view('Formularios.Input.create',compact('properties'));
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
            'producto'=>'required|max:50',
            'lugarElaboracion'=>'required',
            'fechaElaboracion'=>'required|max:50',
            'fechaCosecha'=>'required|max:50',
            'volumenCosecha'=>'required',
            'densidad'=>'required|max:50',
            'loteAsignado'=>'required|max:50',
            'funcion'=>'required|max:50',
        ]);
        $input=new Input;
        $input->producto=$request->producto;
        $input->lugarElaboracion=$request->lugarElaboracion;
        $input->fechaElaboracion=$request->fechaElaboracion;
        $input->fechaCosecha=$request->fechaCosecha;
        $input->volumenCosecha=$request->volumenCosecha;
        $input->densidad=$request->densidad;
        $input->loteAsignado=$request->loteAsignado;
        $input->funcion=$request->funcion;
        $input->save();

        $insumo=$input->id;
        $datos=$request->all();
        $insert=array();

        foreach($datos['solido'] as $key=>$solido){
            $insert[$key]['solido']=$solido;
        }
        foreach($datos['cantidadKg'] as $key=>$cantidadKg){
            $insert[$key]['cantidadKg']=$cantidadKg;
        }
        foreach($datos['liquido'] as $key=>$liquido){
            $insert[$key]['liquido']=$liquido;
        }
        foreach($datos['cantidadLiquido'] as $key=>$cantidadLiquido){
            $insert[$key]['cantidadLiquido']=$cantidadLiquido;
        }

        foreach($insert as $key){    
            $ingredient=new ingredient;
            $ingredient->solido=$key['solido'];
            $ingredient->cantidadKg=$key['cantidadKg'];
            $ingredient->liquido=$key['liquido'];
            $ingredient->cantidadLiquido=$key['cantidadLiquido'];
            $ingredient->insumo_id=$insumo;
            $ingredient->save();
        }


        return redirect()->action([InputController::class,'index'])->with('status_success','Insumo creado.');
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
        $input=Input::find($id);
        return view('Formularios.Input.update',compact('input'));
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
        $input=Input::find($id);
        $request->validate([
            'producto'=>'required|max:50',
            'lugarElaboracion'=>'required|',
            'fechaElaboracion'=>'required|max:50',
            'fechaCosecha'=>'required|max:50',
            'volumenCosecha'=>'required',
            'densidad'=>'required|max:50',
            'loteAsignado'=>'required|max:50',
            'funcion'=>'required|max:50',
        ]);
        $input->producto=$request->producto;
        $input->lugarElaboracion=$request->lugarElaboracion;
        $input->fechaElaboracion=$request->fechaElaboracion;
        $input->fechaCosecha=$request->fechaCosecha;
        $input->volumenCosecha=$request->volumenCosecha;
        $input->densidad=$request->densidad;
        $input->loteAsignado=$request->loteAsignado;
        $input->funcion=$request->funcion;
        $input->save();
        return redirect()->action([InputController::class,'index'])->with('status_success','Insumo actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input=Input::find($id);
        $input->delete();
        return redirect()->action([InputController::class,'index'])->with('status_success','Insumo eliminado.');
    }
}
