<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Employee;
use App\Models\DailyAdvance;

class DailyAdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailies=DailyAdvance::all();
        return view('Formularios.DailyAdvance.index',compact('dailies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees=Employee::all();
        $activities=Activity::all();

        return view('Formularios.DailyAdvance.create',compact('employees','activities'));
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
            'nombreAvance'=>'required|max:50|unique:daily_advances,nombreAvance',
            'seccion'=>'required|max:50|unique:daily_advances,seccion',
            'fecha'=>'required|max:50|unique:daily_advances,fecha',
            'actividad_id'=>'required|max:50|unique:daily_advances,actividad_id',
            'totalSemanal'=>'required|max:50|unique:daily_advances,totalSemanal',
            'porceSemanal'=>'required|max:50|unique:daily_advances,porceSemanal',
            'porceSemanalPrevio'=>'required|max:50|unique:daily_advances,porceSemanalPrevio',
            'porceAcumulado'=>'required|max:50|unique:daily_advances,porceAcumulado',
            'user_id'=>'required|unique:daily_advances,user_id'.$daily->id,
        ]);
        $daily=new DailyAdvance;
        $daily->nombreAvance=$request->nombreAvance;
        $daily->seccion=$request->seccion;
        $daily->fecha=$request->fecha;
        $daily->actividad_id=$request->actividad_id;
        $daily->totalSemanal=$request->totalSemanal;
        $daily->porceSemanal=$request->porceSemanal;
        $daily->porceSemanalPrevio=$request->porceSemanalPrevio;
        $daily->porceAcumulado=$request->porceAcumulado;
        $daily->user_id=$request->user_id;
        $daily->save();

        return redirect()->action([DailyAdvanceController::class,'index'])->with('status_success','Avance creado.');
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
        $daily=DailyAdvance::find($id);
        $activities=Activity::all();
        $employees=Employee::all();
        return view('Formularios.DailyAdvance.update',compact('activities','employees','daily'));
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
        $daily=DailyAdvance::find($id);
        $request->validate([
            'nombreAvance'=>'required|max:50|unique:daily_advances,nombreAvance,'.$daily->id,
            'seccion'=>'required|max:50|unique:daily_advances,seccion,'.$daily->id,
            'fecha'=>'required|max:50|unique:daily_advances,fecha,'.$daily->id,
            'actividad_id'=>'required|max:50|unique:daily_advances,actividad_id,'.$daily->id,
            'totalSemanal'=>'required|max:50|unique:daily_advances,totalSemanal,'.$daily->id,
            'porceSemanal'=>'required|max:50|unique:daily_advances,porceSemanal,'.$daily->id,
            'porceSemanalPrevio'=>'required|max:50|unique:daily_advances,porceSemanalPrevio,'.$daily->id,
            'porceAcumulado'=>'required|max:50|unique:daily_advances,porceAcumulado,'.$daily->id,
            'user_id'=>'required|unique:daily_advances,user_id,'.$daily->id,
        ]);
        $daily->nombreAvance=$request->nombreAvance;
        $daily->seccion=$request->seccion;
        $daily->fecha=$request->fecha;
        $daily->actividad_id=$request->actividad_id;
        $daily->totalSemanal=$request->totalSemanal;
        $daily->porceSemanal=$request->porceSemanal;
        $daily->porceSemanalPrevio=$request->porceSemanalPrevio;
        $daily->porceAcumulado=$request->porceAcumulado;
        $daily->user_id=$request->user_id;
        $daily->save();

        return redirect()->action([DailyAdvanceController::class,'index'])->with('status_success','Avance actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daily=DailyAdvance::find($id);
        $daily->delete();
        return redirect()->action([DailyAdvanceController::class,'index'])->with('status_success','Avance eliminada.');
    }
}
