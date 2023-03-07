<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalEvaluation;
use App\Models\Employee;
use App\Models\Area;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonalEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals=PersonalEvaluation::all();
        return view('Formularios.PersonalEvaluation.index',compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees=Employee::where('user_id',Auth::user()->id)->get();
        $areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
        $activities=Activity::all();
        return view('Formularios.PersonalEvaluation.create',compact('employees','areas','activities'));
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
            'trabajador_id'=>'required|max:50',
            'area_id'=>'required|max:50',
            'actividad_id'=>'required|max:50',
            'metaEstablecido'=>'required|max:50',
            'metaAlcanzada'=>'required|max:50',
            'inspeccion'=>'required|max:50',
            'calificacion'=>'required|max:50',
        ]);
        $personal=new PersonalEvaluation;
        $personal->trabajador_id=$request->trabajador_id;
        $personal->area_id=$request->area_id;
        $personal->actividad_id=$request->actividad_id;
        $personal->metaEstablecido=$request->metaEstablecido;
        $personal->metaAlcanzada=$request->metaAlcanzada;
        $personal->inspeccion=$request->inspeccion;
        $personal->calificacion=$request->calificacion;
        $personal->save();
        return redirect()->action([PersonalEvaluationController::class,'index'])->with('status_success','Evaluación creado.');
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
        $employees=Employee::where('user_id',Auth::user()->id)->get();
        $areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
        $activities=Activity::all();
        $personal=PersonalEvaluation::find($id);
        return view('Formularios.PersonalEvaluation.update',compact('employees','areas','activities','personal'));
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
        $personal=PersonalEvaluation::find($id);
        $request->validate([
            'trabajador_id'=>'required',
            'area_id'=>'required',
            'actividad_id'=>'required',
            'metaEstablecido'=>'required',
            'metaAlcanzada'=>'required',
            'inspeccion'=>'required',
            'calificacion'=>'required',
        ]);
        $personal->trabajador_id=$request->trabajador_id;
        $personal->area_id=$request->area_id;
        $personal->actividad_id=$request->actividad_id;
        $personal->metaEstablecido=$request->metaEstablecido;
        $personal->metaAlcanzada=$request->metaAlcanzada;
        $personal->inspeccion=$request->inspeccion;
        $personal->calificacion=$request->calificacion;
        $personal->save();
        return redirect()->action([PersonalEvaluationController::class,'index'])->with('status_success','Evaluación actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal=PersonalEvaluation::find($id);
        $personal->delete();
        return redirect()->action([PersonalEvaluationController::class,'index'])->with('status_success','Evaluación eliminado.');
    }
}
