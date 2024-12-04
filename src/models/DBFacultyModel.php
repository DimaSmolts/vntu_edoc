<?php

namespace App\Models;

// require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';

// use App\Models\DBWorkingProgramInvolvedPersonModel;

use Illuminate\Database\Eloquent\Model;

class DBFacultyModel extends Model
{
	protected $table = 'departments';

	public $timestamps = false;

	// public function persons()
	// {
	// 	return $this->hasMany(DBWorkingProgramInvolvedPersonModel::class, 'personId');
	// }
}
