<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use PhpParser\Node\Expr\FuncCall;

class ciudad extends Model
{
    use HasFactory;
    protected $table = "ciudad";

    protected function descripcion():Attribute
    {
        return new Attribute(
            get: function($value){
                return ucwords(($value));
            },
            set: function($value){
                if(strlen($value) >= 55){
                    $value = substr($value,0,5);
                }
                return $value;
            }
        );
    }

    protected function pais_id():Attribute
    {
        return new Attribute(
            set: function($value){
                if(!is_int($value)){
                    $value = intval($value);
                    if($value == 0){
                        $value = 1;
                    }
                }

                return $value;
            }
        );
    }
}
