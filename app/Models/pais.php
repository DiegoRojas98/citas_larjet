<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Casts\Attribute;

class pais extends Model
{
    use HasFactory;
    protected $table = "pais";

    protected function descripcion():Attribute
    {
        return new Attribute(
            get: function($value){
                return ucwords($value);
            },
            set: function($value){
                if(strlen($value) >= 55){
                    $value = substr($value,0,54);
                }
                return strtolower($value);
            }
        );
    }
}
