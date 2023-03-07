<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plague;
use App\Models\Property;
use App\Models\Area;
use App\Models\Wage;

class PlagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plagues=Plague::all();
        return view('Formularios.Plague.index',compact('plagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties=Property::all();
        $areas=Area::all();
        $wages=Wage::all();
        return view('Formularios.Plague.create',compact('properties','areas','wages'));
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
            'predio_id'=>'required|max:50',
            'jornal'=>'required|max:50',
            'area_id'=>'required|max:50',
            'superficie'=>'required|max:50',
            'cultivo'=>'required|max:50',
            'nombrePlaga'=>'required|max:50',
            'puntoMuestra'=>'required|max:50',
            'nombreEnfermedad'=>'required|max:50',
        ]);

        $plague=new Plague;
        $plague->predio_id=$request->predio_id;
        $plague->jornal=$request->jornal;
        $plague->area_id=$request->area_id;
        $plague->superficie=$request->superficie;
        $plague->cultivo=$request->cultivo;
        $plague->nombrePlaga=$request->nombrePlaga;
        $plague->puntoMuestra=$request->puntoMuestra;
        $plague->nombreEnfermedad=$request->nombreEnfermedad;
        $plague->save();

        return redirect()->action([PlagueController::class,'index'])->with('status_success','Plaga creado.');
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
        $plague=Plague::find($id);
        $properties=Property::all();
        $areas=Area::all();
        $wages=Wage::all();
        return view('Formularios.Plague.update',compact('palgue','properties','areas','wages'));
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
        $plague=Plague::find($id);
        $request->validate([
            'predio_id'=>'required|max:50'.$plague->id,
            'jornal'=>'required|max:50'.$plague->id,
            'area_id'=>'required|max:50'.$plague->id,
            'superficie'=>'required|max:50'.$plague->id,
            'cultivo'=>'required|max:50'.$plague->id,
            'nombrePlaga'=>'required|max:50'.$plague->id,
            'puntoMuestra'=>'required|max:50'.$plague->id,
            'nombreEnfermedad'=>'required|max:50'.$plague->id,
        ]);
        $plague->predio_id=$request->predio_id;
        $plague->jornal=$request->jornal;
        $plague->area_id=$request->area_id;
        $plague->superficie=$request->superficie;
        $plague->cultivo=$request->cultivo;
        $plague->nombrePlaga=$request->nombrePlaga;
        $plague->puntoMuestra=$request->puntoMuestra;
        $plague->nombreEnfermedad=$request->nombreEnfermedad;
        $plague->save();

        return redirect()->action([PlagueController::class,'index'])->with('status_success','Plaga actuaizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plague=Plague::find($id);
        $plague->delete();
        return redirect()->action([PlagueController::class,'index'])->with('status_success','Plaga eliminado.');
    }
}
