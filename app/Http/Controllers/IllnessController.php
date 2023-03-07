<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Illness;

class IllnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $illnesses=Illness::all();
        return view('Formularios.Illness.index',compact('illnesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Illness.create');
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
            'enfermedad'=>'required|max:50',
        ]);
        $illness=new Illness;
        $illness->enfermedad=$request->enfermedad;
        $illness->save();

        return redirect()->action([IllnessController::class,'index'])->with('status_success','Enfermedad creado.');
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
        $illness=Illness::find($id);
        return view('Formularios.Illness.update',compact('illness'));
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
        $illness=Illness::find($id);
        $request->validate([
            'enfermedad'=>'required|max:50'.$illness->id,
        ]);
        $illness->enfermedad=$request->enfermedad;
        $illness->save();
        return redirect()->action([IllnessController::class,'index'])->with('status_success','Enfermedad actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $illness=Illness::find($id);
        $illness->delete();
        return redirect()->action([IllnessController::class,'index'])->with('status_success','Enfermedad eliminado.');
    }
}
