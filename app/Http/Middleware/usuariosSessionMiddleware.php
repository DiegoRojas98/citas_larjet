<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class usuariosSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('name') && session('rol')){
            $request->xxx = session('name');
            return $next($request);
        }else{
            return redirect()->route('usuarios.login')->with('error','No se ha iniciado session.');
        }
    }
}
