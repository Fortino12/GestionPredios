<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Area;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::authorize('haveaccess','index');
        $users=User::all();
        return view('Formularios.User.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Gate::authorize('haveaccess','create');
        $roles=Role::all();
        return view('Formularios.User.create',compact('roles'));
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
            'nombre'=>'required|max:50',
            'paterno'=>'required|max:50',
            'materno'=>'required|max:50',
            'fechaNacimiento'=>'required',
            'sexo'=>'required|max:50',
            'telefono'=>'required|max:50', 
            'email'=>'required|max:50|unique:users,email',
            'password'=>'required|max:50',
        ]);
        //Gate::authorize('haveaccess','create');
        $user=new User;
        $user->nombre=$request->nombre;
        $user->paterno=$request->paterno;
        $user->materno=$request->materno;
        $user->fechaNacimiento=$request->fechaNacimiento;
        $user->sexo=$request->sexo;
        $user->telefono=$request->telefono;
        $user->email=$request->email;
        $user->password=bcrypt($request['password']);
        $user->role_id=$request->role_id;
        $user->save();
        //$user=User::create([
        //    'nombre'=>$request['nombre'],
        //    'paterno'=>$request['paterno'],
        //    'materno'=>$request['materno'],
        //    'fechaNacimiento'=>$request['fechaNacimiento'],
        //    'sexo'=>$request['sexo'],
        //    'telefono'=>$request['telefono'],
        //    'email'=>$request['email'],
        //    'password'=>bcrypt($request['password']),
        //]);

        //$user->roles()->sync($request->get('roles'));

        return redirect()->action([UserController::class,'index'])->with('status_success','Usuario creado.');
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
      
        
        $user=User::find($id);
        $area_user=[];
        foreach($user->areas as $area){
            $area_user[]=$area->id;
        }
        $areas=Area::all();
        $roles=Role::all();
        return view('Formularios.User.update',compact('user','roles','areas','area_user'));
          
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
        //Gate::authorize('haveaccess','edit');
        $user=User::find($id);
        $request->validate([
            'nombre'=>'required|max:50',
            'paterno'=>'required|max:50',
            'materno'=>'required|max:50',
            'fechaNacimiento'=>'required',
            'sexo'=>'required|max:50',
            'telefono'=>'required|max:50',
        ]);
        $user->nombre=$request->nombre;
        $user->paterno=$request->paterno;
        $user->materno=$request->materno;
        $user->fechaNacimiento=$request->fechaNacimiento;
        $user->sexo=$request->sexo;
        $user->telefono=$request->telefono;
        $user->save();

        $user->areas()->sync($request->get('area'));

        //$user->roles()->sync($request->get('roles'));

        return redirect()->action([UserController::class,'index'])->with('status_success','Usuario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('haveaccess','destroy');
        $user->delete();
        return redirect()->action([UserController::class,'index'])->with('status_success','Usuario eliminado.');
    }
}
