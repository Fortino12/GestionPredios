<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities=Activity::all();
        return view('Formularios.Activity.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Activity.create');
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
            'codigo'=>'required|max:50|unique:activities,codigo',
            'descripcion'=>'required|max:50|unique:activities,descripcion',
        ]);
        $activity=new Activity;
        $activity->codigo=$request->codigo;
        $activity->descripcion=$request->descripcion;
        $activity->save();

        return redirect()->action([ActivityController::class,'index'])->with('status_success','Actividad creada');
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
        $activity=Activity::find($id);
        return view('Formularios.Activity.update',compact('activity'));
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
        $activity=Activity::find($id);
        $request->validate([
            'codigo'=>'required|max:50|unique:activities,codigo,'.$activity->id,
            'descripcion'=>'required|max:50|unique:activities,descripcion,'.$activity->id,
        ]);
        $activity->codigo=$request->codigo;
        $activity->descripcion=$request->descripcion;
        $activity->save();

        return redirect()->action([ActivityController::class,'index'])->with('status_success','Actividad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity=Activity::find($id);
        $activity->delete();
        return redirect()->action([ActivityController::class,'index'])->with('status_success','Actividad eliminada');
    }
}
