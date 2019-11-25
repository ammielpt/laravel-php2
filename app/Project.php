<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table= "projects";
    protected $fillable=['title', 'url', 'description'];
  //  protected $guarded=['title', 'url', 'description']; definimos los campos que no se asignaran masivamente
    public function getRouteKeyName()
    {
        return 'url';
    }
}
