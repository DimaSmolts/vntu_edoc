<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBExamTypeModel extends Model
{
	protected $table = 'dec_exam_types';
	protected $fillable = ['e_name', 'e_short'];

	public $timestamps = false;
}
