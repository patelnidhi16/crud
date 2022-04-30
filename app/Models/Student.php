<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'city',
        'address',
        'gender',
        'hobbie',
        'deleted_at'
    ];
  
    protected $table='students';

}
