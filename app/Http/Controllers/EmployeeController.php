<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('Formularios.Employee.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
        //$areas=Area::all();
        return view('Formularios.Employee.create',compact('areas'));
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
            'curp'=>'required|min:18|max:18|unique:employees,curp',
            'nombreTrabajador'=>'required|max:50',
            'paternoTrabajador'=>'required|max:50',
            'maternoTrabajador'=>'required|max:50',
            'sexo'=>'required|max:50',
            'telefono'=>'required|max:50',
            'area_id'=>'required|max:50',
        ]);
        $employee=new Employee;
        $employee->curp=$request->curp;
        $employee->nombreTrabajador=$request->nombreTrabajador;
        $employee->paternoTrabajador=$request->paternoTrabajador;
        $employee->maternoTrabajador=$request->maternoTrabajador;
        $employee->sexo=$request->sexo;
        $employee->telefono=$request->telefono;
        $employee->area_id=$request->area_id;
        $employee->user_id=Auth::user()->id;
        $employee->save();

        return redirect()->action([EmployeeController::class,'index'])->with('status_success','Trabajador creado.');

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
        //$employee=Employee::find($id);
        $areas=DB::table('area_user')->join('areas','areas.id','=','area_user.area_id')->join('users','users.id','=','area_user.user_id')->select('areas.id','areas.descripcion')->where('area_user.user_id',Auth::user()->id)->get();
        $employee=DB::table('employees')->join('areas','employees.area_id','=','areas.id')->select('areas.descripcion','employees.*')->where('employees.id',$id)->first();
        return view('Formularios.Employee.update',compact('employee','areas'));
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
        $employee=Employee::find($id);
        $request->validate([
            'curp'=>'required|max:50|unique:employees,curp,'.$employee->id,
            'nombreTrabajador'=>'required|max:50,'.$employee->id,
            'paternoTrabajador'=>'required|max:50,'.$employee->id,
            'maternoTrabajador'=>'required|max:50,'.$employee->id,
            'sexo'=>'required|max:50,'.$employee->id,
            'telefono'=>'required|max:50,'.$employee->id,
            'area_id'=>'required|max:50,'.$employee->id,
        ]);
        $employee->curp=$request->curp;
        $employee->nombreTrabajador=$request->nombreTrabajador;
        $employee->paternoTrabajador=$request->paternoTrabajador;
        $employee->maternoTrabajador=$request->maternoTrabajador;
        $employee->sexo=$request->sexo;
        $employee->telefono=$request->telefono;
        $employee->area_id=$request->area_id;
        $employee->save();

        return redirect()->action([EmployeeController::class,'index'])->with('status_success','Trabajador actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::find($id);
        $employee->delete();
        return redirect()->action([EmployeeController::class,'index'])->with('status_success','Trabajador eliminado.');
    }
}
