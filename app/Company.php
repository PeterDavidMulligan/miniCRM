<?php

namespace miniCRM;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'companies';
  protected $fillable = ['email','logo','phone'];
}
