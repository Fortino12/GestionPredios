<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\User;
use App\Models\Enforcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EnforcementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enforcements=Enforcement::all();
        return view('Formularios.Enforcement.index',compact('enforcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
        $areas=Area::all();
        return view('Formularios.Enforcement.create',compact('areas'));
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
            'area_id'=>'required|max:50,',
            'fechaAplicacion'=>'required|max:50,',
            'nombreComercial'=>'required|max:50,',
            'noRegistro'=>'required|max:50,',
            'noLote'=>'required|max:50,',
            'toxicologia'=>'required|max:50,',
            'ingrediente'=>'required|max:50,',
            'dosis'=>'required|max:50,',
            'nutricion'=>'required|max:50,',
        ]);
        $enforcement=new Enforcement;
        $enforcement->area_id=$request->area_id;
        $enforcement->fechaAplicacion=$request->fechaAplicacion;
        $enforcement->nombreComercial=$request->nombreComercial;
        $enforcement->noRegistro=$request->noRegistro;
        $enforcement->noLote=$request->noLote;
        $enforcement->toxicologia=$request->toxicologia;
        $enforcement->ingrediente=$request->ingrediente;
        $enforcement->dosis=$request->dosis;
        $enforcement->plagaoEnfermedad=$request->plagaoEnfermedad;
        $enforcement->nutricion=$request->nutricion;
        $enforcement->responsable=Auth::user()->id;
        $enforcement->save();
        return redirect()->action([EnforcementController::class,'index'])->with('status_success','Apliación creado.');
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
        $enforcement=Enforcement::find($id);
        $enforcement=DB::table('enforcements')->join('areas','enforcements.area_id','=','areas.id')->select('areas.descripcion','enforcements.*')->where('enforcements.id',$id)->first();
        
        return view('Formularios.Enforcement.update',compact('areas','enforcement'));
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
        $enforcement=Enforcement::find($id);
        $request->validate([
            'area_id'=>'required|max:50,'.$enforcement->id,
            'fechaAplicacion'=>'required|max:50,'.$enforcement->id,
            'nombreComercial'=>'required|max:50,'.$enforcement->id,
            'noRegistro'=>'required|max:50,'.$enforcement->id,
            'noLote'=>'required|max:50,'.$enforcement->id,
            'toxicologia'=>'required|max:50,'.$enforcement->id,
            'ingrediente'=>'required|max:50,'.$enforcement->id,
            'dosis'=>'required|max:50,'.$enforcement->id,
            'plagaoEnfermedad'=>'required|max:50,'.$enforcement->id,
            'nutricion'=>'required|max:50,'.$enforcement->id,
        ]);
        $enforcement->area_id=$request->area_id;
        $enforcement->fechaAplicacion=$request->fechaAplicacion;
        $enforcement->nombreComercial=$request->nombreComercial;
        $enforcement->noRegistro=$request->noRegistro;
        $enforcement->noLote=$request->noLote;
        $enforcement->toxicologia=$request->toxicologia;
        $enforcement->ingrediente=$request->ingrediente;
        $enforcement->dosis=$request->dosis;
        $enforcement->plagaoEnfermedad=$request->plagaoEnfermedad;
        $enforcement->nutricion=$request->nutricion;
        $enforcement->save();
        return redirect()->action([EnforcementController::class,'index'])->with('status_success','Aplicación actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enforcement=Enforcement::find($id);
        $enforcement->delete();
        return redirect()->action([EnforcementController::class,'index'])->with('status_success','Aplicación elimanado.');
    }
}
