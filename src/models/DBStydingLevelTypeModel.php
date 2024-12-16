<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBStydingLevelTypeModel extends Model
{
	protected $table = 'dec_curr_level';
	protected $fillable = ['l_name', 'l_prg'];

	public $timestamps = false;
}
