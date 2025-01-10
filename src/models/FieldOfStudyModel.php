<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldOfStudyModel extends Model
{
	protected $table = 'fieldsOfStudy';
	protected $fillable = ['name'];

	public $timestamps = false;
}
