@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Permisos
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('permission.update',$permission['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="nombrePermiso">Nombre del Permiso</label>
                        <input type="text" name="nombrePermiso" class="input" value="{{old('nombrePermiso',$permission['nombrePermiso'])}}" placeholder="Nombre del Permiso">
                    </div>
                    <div class="input_field">
                        <label for="slug">Slug del permiso</label>
                        <input type="text" name="slug" class="input" value="{{old('slug',$permission['slug'])}}" placeholder="Slug del Permiso">
                    </div>
                    <div class="input_field">
                        <label for="descripcion">Descripción</label>
                        <input type="text"  name="descripcion" class="input" value="{{old('descripcion',$permission['descripcion'])}}" placeholder="Codigo de la actividad">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Permiso" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection