@extends('layouts.plantilla')

@section('title','Citas')


@section('stylesAdd')
    @vite(['resources/sass/usuarioCreate.scss'])
@endsection


@section('body')

    <x-navbar />

    <x-navCitas />

    <div class="createForm mt-5">
        <form action="{{route('citas.save')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <select id="especialidad_id" name="especialidad_id" class="form-control">
                    @foreach ($especialidad as $item)
                        <option value="{{$item->id}}"
                        @if (old('especialidad_id') == $item->id)
                           selected
                        @endif    
                        >{{$item->descripcion}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="asesor_id" class="form-label">Asesor</label>
                <select name="asesor_id" id="asesor_id" class="form-control">
                    <option value="0" disabled selected>Seleccione un Asesor</option>
                    @foreach ($asesores as $item)
                        <option value="{{$item->id}}" class="especialidad{{$item->especialidad}} asesor"
                            @if ($item->id == old('asesor_id'))
                                selected
                            @endif
                        >{{$item->nombre}}</option>
                    @endforeach
                </select>
                @error('asesor_id')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" min="{{date("Y-m-").date("d")+1}}" value="{{old('fecha')}}">
                @error('fecha')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <select name="hora" id="hora" class="form-control">
                    <option value="0" disabled selected>Seleccione una hora</option>
                    @for ($x = 6 ; $x < 19;$x++)
                        <option value="{{$x}}" class="h{{$x}} hora"
                        @if (old('hora') == $x)
                            selected
                        @endif
                        >{{$x}}</option>
                    @endfor
                </select>
                @error('hora')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Enviar</button>

        </form>
    </div>

@endsection

@section('jscripts')

    @vite(['resources/js/crearCita.js'])
    
@endsection