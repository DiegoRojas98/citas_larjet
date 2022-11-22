@extends('layouts.plantilla')

@section('title','Dashboard')


@section('stylesAdd')
    {{-- datatableJquery --}} {{-- Require bootstarp  y jquery --}}
    @vite(['resources/sass/dataTables.bootstrap4.min.css'])

    @vite(['resources/sass/minAlert.scss'])
@endsection


@section('body')

    <x-navbar />

    <div class="card mt-3">
        <div class="card-body">

            <table class="table table-stripped" id="tbl" >
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Identidad</th>
                        <th>Tipo Identidad</th>
                        <th>Rol</th>
                        <th>Pais</th>
                        <th>Ciudad</th>
                        <th>Modificar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->identidad}}</td>
                            <td>{{$user->TD}}</td>
                            <td>{{$user->rol}}</td>
                            <td>{{$user->pais}}</td>
                            <td>{{$user->ciudad}}</td>
                            <td><button type="button" class="btn btn-primary bt" value="{{$user->id}}">Modificar</button></td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>


    <div class="modal fade" id="modificarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >Modificar Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="update">
                    @csrf
                </form>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre <x-minAlert id="nombreHelper"/></label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="identidad" class="form-label">Identidad <x-minAlert id="identidadHelper"/></label>
                    <input type="text" class="form-control" id="identidad" name="identidad">
                </div>

                <div class="mb-3">
                    <label for="tipoI" class="form-label">Tipo Identidad</label>
                    <x-select id="tipoI" name="tipoI" :arr="$tipoI" />
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <x-select id="rol" name="rol" :arr="$rol" />
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <x-select id="estado" name="estado" :arr="$estado" />
                </div>


                <div class="mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <x-select id="pais" name="pais" :arr="$pais" />
                </div>

                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad <x-minAlert id="ciudadHelper"/></label>
                    <select  id="ciudad"  name="ciudad" class="form-control">
                        <option value="0">Seleccione una opcion</option>
                        @foreach ($ciudad as $item)
                            <option value="{{$item->id}}" class="pais{{$item->pais_id}} ciudad">{{$item->descripcion}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" id="experienciaDiv">
                    <label for="experiencia" class="form-label">Experiencia <x-minAlert id="experienciaHelper"/></label>
                    <input type="number" class="form-control" id="experiencia" name="experiencia">
                </div>

                <div class="mb-3" id="especialidadDiv">
                    <label for="especialidad" class="form-label">Especialidad <x-minAlert id="especialidadHelper"/></label>
                    <x-select id="especialidad" name="especialidad" :arr="$especialidad" />
                </div>

                <div class="mb-3" id="horaInicioDiv">
                    <label for="horaInicio" class="form-label">Inicio de atencion <x-minAlert id="horaInicioHelper"/></label>
                    <input type="number" class="form-control" id="horaInicio" name="horaInicio">
                </div>

                <div class="mb-3" id="horaFinalDiv">
                    <label for="horaFinal" class="form-label">Finalizacion de atencion <x-minAlert id="horaFinalHelper"/></label>
                    <input type="number" class="form-control" id="horaFinal" name="horaFin">
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('jscripts')
    {{-- DataTableJquery && ResponsibeTable --}} {{-- Require bootstarp  y jquery --}}
    @vite(['resources/js/jquery.dataTables.min.js','resources/js/dataTables.bootstrap4.min.js'])

    <script>
        $(document).ready(function () {
            $('#tbl').DataTable();
        });
    </script>


    @vite(['resources/js/modificar.js']);

@endsection