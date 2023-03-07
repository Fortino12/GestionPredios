<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::authorize('haveaccess','index');
        $roles=Role::all();
        return view('Formularios.Role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Gate::authorize('haveaccess','create');
        $permissions=Permission::all();
        return view('Formularios.Role.create',compact('permissions'));
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
            'nombreRol'=>'required|max:50|unique:roles,nombreRol',
            'slug'=>'required|max:50|unique:roles,slug',
            'descripcion'=>'required|max:50|unique:roles,descripcion',
            'full_access'=>'required|in:Si,No'
        ]);

        //Gate::authorize('haveaccess','create');
        $role=Role::create([
            'nombreRol'=>$request['nombreRol'],
            'slug'=>$request['slug'],
            'descripcion'=>$request['descripcion'],
            'full_access'=>$request['full_access'],
        ]);

        $role->permissions()->sync($request->get('permission'));

        return redirect()->action([RoleController::class,'index'])->with('status_success','Rol creado');
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
        //Gate::authorize('haveaccess','edit');
        $role=Role::find($id);
        $permission_role=[];
        foreach($role->permissions as $permission){
            $permission_role[]=$permission->id;
        }
        $permissions=Permission::all();
        return view('Formularios.Role.update',compact('role','permissions','permission_role'));
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
        $role=Role::find($id);
        $request->validate([
            'nombreRol'=>'required|max:50|unique:roles,nombreRol,'.$role->id,
            'slug'=>'required|max:50|unique:roles,slug,'.$role->id,
            'descripcion'=>'required|max:50|unique:roles,descripcion,'.$role->id,
        ]);
        //Gate::authorize('haveaccess','edit');
        
        $role->nombreRol=$request->nombreRol;
        $role->slug=$request->slug;
        $role->descripcion=$request->descripcion;
        $role->full_access=$request->full_access;
        $role->save();

        $role->permissions()->sync($request->get('permission'));

        return redirect()->action([RoleController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Gate::authorize('haveaccess','destroy');
        $role=Role::find($id);
        $role->delete();
        return redirect()->action([RoleController::class,'index'])->with('status_success','Rol Eliminado ');
    }
}
