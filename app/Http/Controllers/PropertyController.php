<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Area;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties=Property::all();
        return view('Formularios.Property.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Property.create');
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
            'estado'=>'required|max:50',
            'municipio'=>'required|max:50',
            'direccion'=>'required',
            'nombrePredio'=>'required',
            'cota'=>'required',
            'descripcion'=>'required',
        ]);

        $property=new Property;
        $property->estado=$request->estado;
        $property->municipio=$request->municipio;
        $property->direccion=$request->direccion;
        $property->nombrePredio=$request->nombrePredio;
        $property->save();

        $predio=$property->id;
        $datos=$request->all();
        $insert=array();

        foreach($datos['cota'] as $key=>$cota){
            $insert[$key]['cota']=$cota;
        }
        foreach($datos['descripcion'] as $key=>$descripcion){
            $insert[$key]['descripcion']=$descripcion;
        }

        foreach($insert as $key){    
            $area=new Area;
            $area->cota=$key['cota'];
            $area->descripcion=$key['descripcion'];
            $area->predio_id=$predio;
            $area->save();
        }

        return redirect()->action([PropertyController::class,'index'])->with('status_success','Predio creado.');
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
        $property=Property::find($id);
        return view('Formularios.Property.update',compact('property'));
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
        $property=Property::find($id);
        $request->validate([
            'estado'=>'required|max:50'.$property->id,
            'municipio'=>'required|max:50'.$property->id,
            'direccion'=>'required|max:50'.$property->id,
            'nombrePredio'=>'required|max:50'.$property->id,
        ]);
        $property->estado=$request->estado;
        $property->municipio=$request->municipio;
        $property->direccion=$request->direccion;
        $property->nombrePredio=$request->nombrePredio;
        $property->save();

        return redirect()->action([PropertyController::class,'index'])->with('status_success','Predio actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property=Property::find($id);
        $property->delete();

        return redirect()->action([PropertyController::class,'index'])->with('status_success','Predio eliminado.');
    }
}
