<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\Property;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas=Area::all();
        //$areas=DB::table('areas')->join('properties','areas.predio_id','=','properties.id')->select('areas.*','properties.nombrePredio')->get();
        return view('Formularios.Area.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties=Property::all();
        return view('Formularios.Area.create',compact('properties'));
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
            'cota'=>'required|max:50|unique:areas,cota',
            'descripcion'=>'required|max:50|unique:areas,descripcion',
            'predio_id'=>'required|max:50',
        ]);
        $datos=$request->all();
        $predio=$request->predio_id;
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

        return redirect()->action([AreaController::class,'index'])->with('status_success','Area creada.');
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
        $area=Area::find($id);
        //$area=DB::table('areas')->join('properties','areas.predio_id','=','properties.id')->select('areas.*','properties.nombrePredio')->where('areas.id','=',$id)->get(); Pediente
        
        $properties=Property::All();
        return view('Formularios.Area.update',compact('area','properties'));
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
        $area=Area::find($id);
        $request->validate([
            'cota'=>'required|max:50',
            'descripcion'=>'required|max:50',
        ]);
        $area->cota=$request->cota;
        $area->descripcion=$request->descripcion;
        $area->save();

        return redirect()->action([AreaController::class,'index'])->with('status_success','Area actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area=Area::find($id);
        $area->delete();
        return redirect()->action([AreaController::class,'index'])->with('status_success','Area eliminada.');
    }
}
