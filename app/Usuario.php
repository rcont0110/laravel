<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

	
	protected $filltable = ['nombres','apellidos','email','user', 'pass'];
	
	protected $fillable = ['nombres','apellidos','email','user', 'pass'];
	
}
