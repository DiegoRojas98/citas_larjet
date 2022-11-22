<?php

namespace App\Http\Controllers;

use App\Models\ciudad;
use Illuminate\Http\Request;

class ciudadController extends Controller
{
    public function find($id){
        $data = ciudad::find($id);
        return json_encode($data);
    }
}
