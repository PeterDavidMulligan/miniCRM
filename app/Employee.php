<?php

namespace miniCRM;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = ['company','email','phone'];
  function company()
  {
    return $this->belongsTo('company', 'id');
  }
}
