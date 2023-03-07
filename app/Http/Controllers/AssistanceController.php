<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Area;
use App\Models\Assistance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assistances=Assistance::all();
        return view('Formularios.Assistance.index',compact('assistances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
    
        $employees=Employee::all();
        $employees = DB::table('employees')->where('user_id', Auth::user()->id)->get();
        return view('Formularios.Assistance.create',compact('areas','employees'));
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
            'trabajador_id'=>'required|unique:assistances,trabajador_id',
            'area_id'=>'required|unique:assistances,area_id',
            'estatus'=>'required|unique:assistances,estatus',
            'fecha'=>'required|unique:assistances,fecha',
        ]);
        $data=$request->all();
        $insert=array(); 

        foreach($data['trabajador_id'] as $key=>$trabajador_id){
            $insert[$key]['trabajador_id']=$trabajador_id;
        }
        foreach($data['area_id'] as $key=>$area_id){
            $insert[$key]['area_id']=$area_id;
        }
        foreach($data['estatus'] as $key=>$estatus){
            $insert[$key]['estatus']=$estatus;
        }

        foreach($insert as $key){
            $assistance=new Assistance;
            $assistance->trabajador_id=$key['trabajador_id'];
            $assistance->area_id=$key['area_id'];
            $assistance->estatus=$key['estatus'];
            $assistance->fecha=$request->fecha;
            $assistance->save();
        }
        return redirect()->action([AssistanceController::class,'index'])->with('status_success','Asistencia creada.');
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
        $areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
    
        $employees=Employee::all();
        $assistance=Assistance::find($id);
        return view('Formularios.Assistance.update',compact('assistance','areas','employees'));
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
        $assistance=Assistance::find($id);
        
        $assistance->trabajador_id=$request->trabajador_id;
        $assistance->area_id=$request->area_id;
        $assistance->estatus=$request->estatus;
        $assistance->fecha=$request->fecha;
        $assistance->save();
        return redirect()->action([AssistanceController::class,'index'])->with('status_success','Asistencia actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assistance=Assistance::find($id);
        $assistance->delete();
        return redirect()->action([AssistanceController::class,'index'])->with('status_success','Asistencia eliminada.');
    }
}
