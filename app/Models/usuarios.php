<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class usuarios extends Model
{
    use HasFactory;
    protected $table = "usuarios";
    protected $fillable = ['nombre','identidad','password','rol_id','estado_id','tipo_identidad_id','ciudad_id',
        'experiencia','especialidad','horaInicio','horaFinal'];

    protected function password():Attribute
    {
        return new Attribute(
            set: function($value){
                return password_hash($value, PASSWORD_DEFAULT);
            }
        );
    }

    protected function nombre():Attribute
    {
        return new Attribute(
            get: function($value){
                return ucwords($value);
            },
            set: function($value){
                if(strlen($value) >= 65){
                    $value = substr($value,0,64);
                }
                return strtolower($value);
            }
        );
    }

    protected function identidad():Attribute
    {
        return new Attribute(
            set: function($value){
                if(strlen($value) > 25){
                    $value = substr($value,0,25);
                }
                return $value;
            }
        );
    }

    
    protected function rol_id():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value,3);
            }
        );
    }

    protected function estado_id():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value,5);
            }
        );
    }

    protected function tipo_identificacion_id():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value,1);
            }
        );
    }

    protected function ciudad_id():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value,1);
            }
        );
    }

    protected function expericia():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value);
            }
        );
    }

    protected function especialidad():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value,1);
            }
        );
    }

    protected function horaInicio():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value);
            }
        );
    }

    protected function horaFin():Attribute
    {
        return new Attribute(
            set: function($value){
                return $this->isSelfInteger($value);
            }
        );
    }



    private function isSelfInteger($value,$default = 0){
        if(!is_int($value)){
            $value = intval($value);
            if($value == 0){
                $value = $default;
            }
        }
        return $value;
    }
    

    


}
