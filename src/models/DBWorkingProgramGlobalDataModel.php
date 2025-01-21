<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBWorkingProgramGlobalDataModel extends Model
{
	protected $table = 'workingProgramGlobalData';
	protected $fillable = [
		'universityName',
		'universityShortName',
		'academicRightsAndResponsibilities',
	];

	public $timestamps = false;
}
