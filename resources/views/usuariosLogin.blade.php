@extends('layouts.plantilla')

@section('title','Login')

@section('stylesAdd')
    @vite(['resources/sass/login.scss'])
@endsection

@section('body')
    

    <div class="loginForm mt-5">
        <form action="{{route('usuarios.acces')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="Identidad">Identidad</label>
            <input type="text" class="form-control" id="Identidad" name="Identidad" aria-describedby="identidadHelp" placeholder="Escribe tu Identidad" value="{{old('Identidad')}}">
            @error('Identidad')
                <small id="identidadHelp" class="form-text text-muted">{{$message}}</small>    
            @enderror
            </div>
            <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="{{old('Password')}}">
            @error('Password')
                <small id="passwordlHelp" class="form-text text-muted">{{$message}}</small>    
            @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2 ">Log-In</button>
            <a href="{{route('usuarios.create')}}"><button type="button" class="btn btn-primary mt-2 ">Registro</button></a>
        </form>
        @if (session('error'))
            <x-alertLogin type="warning" message="{{session('error')}}" />
        @elseif (session('create'))
            <x-alertLogin type="success" message="{{session('create')}}" />
        @endif
        
    </div>

    


@endsection