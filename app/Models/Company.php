<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


    protected $table = 'company';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [

    ];

}
