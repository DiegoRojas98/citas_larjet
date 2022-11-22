@extends('layouts.plantilla')

@section('title','Dashboard')


@section('stylesAdd')
    @vite(['resources/sass/usuarioUpdate.scss'])
@endsection


@section('body')

    <x-navbar />

    <div class="createForm mt-5">
        <form action="{{route('usuarios.update')}}" method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre',$user->nombre)}}">
            @error('nombre')
                <x-divHelp message="{{$message}}" />
            @enderror
            </div>

            <div class="mb-3">
            <label for="identidad" class="form-label">Identidad</label>
            <input type="text" class="form-control" name="identidad" value="{{old('identidad',$user->identidad)}}" readonly>
            @error('identidad')
                <x-divHelp message="{{$message}}" />
            @enderror
            </div>
            
            <div class="mb-3">
                <label for="tipoIdentidad" class="form-label">Tipo de Identidad</label>
                <select name="tipoIdentidad" name="tipoIdentidad" class="form-control">
                    @foreach ($tipoIdentificacion as $tipo)
                        <option value="{{$tipo->id}}" 
                        @if ($user->tipo_identidad_id == $tipo->id)
                            selected
                        @endif    
                        >{{$tipo->descripcion}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">Pais</label>
                <select  id="pais" name="pais" class="form-control">
                    @foreach ($pais as $pais)
                        <option value="{{$pais->id}}">{{$pais->descripcion}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <select id="ciudad" name="ciudad" class="form-control" required>
                    <option value="0" disabled>Seleccione una ciudad</option>
                    @foreach ($ciudad as $ciu)
                        <option value="{{$ciu->id}}" class="pais{{$ciu->pais_id}} ciudad"
                        @if ($user->ciudad_id == $ciu->id)
                            {{"selected"}}
                        @endif    
                        >{{$ciu->descripcion}}</option>
                    @endforeach
                </select>
                @error('ciudad')
                    <x-divHelp message="{{$message}}" />
                @enderror
            </div>


            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <x-divHelp message="{{$message}}" />
            @enderror
            

            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>

        @if (session('update'))
            <x-alertLogin type="success" message="{{session('update')}}" />
        @endif

    </div>

@endsection

@section('jscripts')
    @vite(['resources/js/ciudadesOrders.js'])
@endsection