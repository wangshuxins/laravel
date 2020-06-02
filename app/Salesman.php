<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
     protected $table = 'salesman';

	 protected  $primaryKey = 'sal_id';

	 public $timestamps = false;
}
