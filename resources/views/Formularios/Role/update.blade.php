@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Rol
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('rol.update',$role['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="nombreRol">Nombre del Rol</label>
                        <input type="text" name="nombreRol" class="input" value="{{old('nombreRol',$role['nombreRol'])}}" placeholder="Nombre del Rol">
                    </div>
                    <div class="input_field">
                        <label for="slug">Slug del Rol</label>
                        <input type="text" name="slug" class="input" value="{{old('slug',$role['slug'])}}" placeholder="Slug del Rol">
                    </div>
                    <div class="input_field">
                        <label for="descripcion">Descripción</label>
                        <input type="text"  name="descripcion" class="input" value="{{old('descripcion',$role['descripcion'])}}" placeholder="Codigo de la actividad">
                   </div>
                    <h3>Full Access</h3>

                    <div class="input_field ">
                        <input type="radio" id="btnSeleccionar" name="full_access" class="custom-control-input" value="Si"
                            @if($role['full_access']=="Si")
                                checked
                            @elseif(old('full_access')=="Si")
                                checked
                            @endif
                        >
                        <label for="fullaccesssi" class="custom-control-label">Si</label>
                    </div>
                    <div class="input_field">
                        <input type="radio" name="full_access" id="btnDeseleccionar" class="custom-control-input" value="No"
                            @if($role['full_access']=="No")
                                checked
                            @elseif(old('full_access')=="No")
                                checked
                            @endif
                        >
                        <label for="fullaccessno" class="custom-control-label">No</label>
                    </div>
                    <h3>Permisos</h3>
                    @foreach($permissions as $permission)
                        <div class="custom-control custom-checkbox permission">
                            <input type="checkbox" class="custom-control-input" name="permission[]" value="{{$permission['id']}}"
                                @if(is_array(old('permission')) && in_array("$permission->id",old('permission')))
                                    checked
                                @elseif(is_array($permission_role) && in_array("$permission->id",$permission_role))
                                    checked
                                @endif
                            >
                            <label for="permission" class="custom-control-label">
                                {{$permission["id"]}}-{{$permission["nombrePermiso"]}}
                                <em>({{$permission["descripcion"]}})</em>
                            </label>
                        </div>
                    @endforeach
                    
                    <div class="input_field">
                        <input type="submit" value="Actualizar Rol" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection