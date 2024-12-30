<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBTaskTypeModel extends Model
{
	protected $table = 'taskTypes';
	protected $fillable = ['name'];

	public $timestamps = false;
}
