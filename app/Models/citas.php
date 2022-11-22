<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use PhpParser\Node\Expr\FuncCall;

class citas extends Model
{
    use HasFactory;
    protected $table = "citas";

}

