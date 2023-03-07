<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::all();
        return view('Formularios.Permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Formularios.Permission.create');
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
            'nombrePermiso'=>'required|max:50|unique:permissions,nombrePermiso,',
            'slug'=>'required|max:50|unique:permissions,slug,',
            'descripcion'=>'required|max:100|unique:permissions,descripcion,',
        ]);
        $permission=Permission::create([
            'nombrePermiso'=>$request['nombrePermiso'],
            'slug'=>$request['slug'],
            'descripcion'=>$request['descripcion'],
        ]);

        return redirect()->action([PermissionController::class,'index'])->with('status_success','Permiso creado.');
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
        $permission=Permission::find($id);

        return view('Formularios.Permission.update',compact('permission'));
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
        $permission=Permission::find($id);
        $request->validate([
            'nombrePermiso'=>'required|max:50|unique:permissions,nombrePermiso,'.$permission->id,
            'slug'=>'required|max:50|unique:permissions,slug,'.$permission->id,
            'descripcion'=>'required|max:50|unique:permissions,descripcion,'.$permission->id,
        ]);
        $permission->nombrePermiso=$request->nombrePermiso;
        $permission->slug=$request->slug;
        $permission->descripcion=$request->descripcion;
        $permission->save();

        return redirect()->action([PermissionController::class,'index'])->with('status_success','Permiso actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->action([PermissionController::class,'index'])->with('status_success','Permiso eliminado.');
    }
}
