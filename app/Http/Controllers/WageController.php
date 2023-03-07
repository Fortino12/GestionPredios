<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Area;
use App\Models\Wage;

class WageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wages=Wage::all();
        return view('Formularios.Wage.index',compact('wages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities=Activity::all();
        $areas=Area::all();
        return view('Formularios.Wage.create',compact('activities','areas'));
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
            'actividad_id'=>'required|max:50',
            'area_id'=>'required|max:50',
            'fecha'=>'required|max:50',
            'estatus'=>'required|max:50',
        ]);
        $wage=new Wage;
        $wage->actividad_id=$request->actividad_id;
        $wage->area_id=$request->area_id;
        $wage->fecha=$request->fecha;
        $wage->estatus=$request->estatus;
        $wage->save();
        return redirect()->action([WageController::class,'index'])->with('status_success','Rol creado');
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
        $activities=Activity::all();
        $areas=Area::all();
        $wage=Wage::find($id);
        return view('Formularios.Wage.update',compact('activities','areas','wage'));
    
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
        $wage=Wage::find($id);
        $request->validate([
            'actividad_id'=>'required|max:50'.$wage->id,
            'area_id'=>'required|max:50'.$wage->id,
            'fecha'=>'required|max:50'.$wage->id,
            'estatus'=>'required|max:50'.$wage->id,
        ]);
        $wage->actividad_id=$request->actividad_id;
        $wage->area_id=$request->area_id;
        $wage->fecha=$request->fecha;
        $wage->estatus=$request->estatus;
        $wage->save();
        return redirect()->action([WageController::class,'index'])->with('status_success','Rol creado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wage=Wage::find($id);
        $wage->delete();
        return redirect()->action([WageController::class,'index'])->with('status_success','Rol creado');
    }
}
