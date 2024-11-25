<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBGlobalWorkingProgramsDataModel extends Model
{
	protected $table = 'globalWorkingProgramsData';
	protected $fillable = ['name', 'value'];

	public $timestamps = false;
}
