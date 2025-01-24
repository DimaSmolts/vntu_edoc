<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBSubjectTypeModel extends Model
{
	protected $table = 'dec_subj_type';
	protected $fillable = ['id', 'subj_type'];

	public $timestamps = false;
}
