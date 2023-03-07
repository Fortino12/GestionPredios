<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plague;
use App\Models\Illness;
use App\Models\DailyAdvance;
use App\Models\Flowerpot;

class FlowerpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowerpots=Flowerpot::all();
        return view('Formularios.Flowerpot.index',compact('flowerpots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plagues=Plague::all();
        $illness=Illness::all();
        $dailies=DailyAdvance::all();
        return view('Formularios.Flowerpot.create',compact('plagues','illness','dailies'));
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
            'nombreMacetero'=>'required|max:50',
            'plaga_id'=>'required|max:50',
            'enfermedad_id'=>'required|max:50',
            'avanceDiario_id'=>'required|max:50',
        ]);
        $flowerpot=new Flowerpot;
        $flowerpot->nombreMacetero=$requeste->nombreMacetero;
        $flowerpot->plaga_id=$request->plaga_id;
        $flowerpot->enfermedad_id=$request->enfermedad_id;
        $flowerpot->avanceDiario_id=$request->avanceDiario_id;
        $flowerpot->save();
        return redirect()->action([FlowerpotController::class,'index'])->with('status_success','Macetero creado');
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
        $plagues=Plague::all();
        $illness=Illnesss::all();
        $dailies=DailyAdvance::all();
        $flowerpot=Flowerpot::find($id);
        return view('Formularios.Flowerpot',compact('plagues','illness','dailies','flowerpot'));
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
        $flowerpot=Flowerpot::find($id);
        $request->validate([
            'nombreMacetero'=>'required|max:50'.$flowerpot->id,
            'plaga_id'=>'required|max:50'.$flowerpot->id,
            'enfermedad_id'=>'required|max:50'.$flowerpot->id,
            'avanceDiario_id'=>'required|max:50'.$flowerpot->id,
        ]);
        $flowerpot->nombreMacetero=$requeste->nombreMacetero;
        $flowerpot->plaga_id=$request->plaga_id;
        $flowerpot->enfermedad_id=$request->enfermedad_id;
        $flowerpot->avanceDiario_id=$request->avanceDiario_id;
        $flowerpot->save();
        return redirect()->action([FlowerpotController::class,'index'])->with('status_success','Macetero actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flowerpot=Flowerpot::find($id);
        $flowerpot->delete();
        return redorect()->action([FlowerpotController::class,'index'])->with('status_success','Macetero eliminado.');
    }
}
