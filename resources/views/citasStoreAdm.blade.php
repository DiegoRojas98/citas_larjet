@extends('layouts.plantilla')

@section('title','Dashboard')


@section('stylesAdd')
    
@endsection


@section('body')

    <x-navbar />

    <x-navCitas />

    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-stripped" id="tbl" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Asesor</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Cancelar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($citas as $citas)
                        <tr>
                            <td>{{$citas->id}}</td>
                            <td>{{$citas->fecha}}</td>
                            <td>{{$citas->hora}}</td>
                            <td>{{$citas->Asesor}}</td>
                            <td>{{$citas->Cliente}}</td>
                            <td>{{$citas->estado}}</td>
                            <td>
                                <form action="{{route('citas.update')}}" method="POST">
                                    @csrf
                                    @method("put")
                                    <input type="hidden" name="id" value="{{$citas->id}}">
                                    <button type="submit" class="btn btn-danger " value="{{$citas->id}}">Cancelar</button>    
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            
            @if (session('remove'))
                <x-alertLogin type="success" message="{{session('remove')}}"/>
            @endif
        </div>
    </div>
    

@endsection

@section('jscripts')
    
@endsection