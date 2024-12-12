<?php

namespace App\Models;

require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';
require_once __DIR__ . '/DBPositionModel.php';

use App\Models\DBWorkingProgramInvolvedPersonModel;
use App\Models\DBPositionModel;

use Illuminate\Database\Eloquent\Model;

class DBTeacherModel extends Model
{
	protected $table = 'teachers';
	protected $fillable = ['d_code', 't_name', 'position'];

	public $timestamps = false;

	public function persons()
	{
		return $this->hasMany(DBWorkingProgramInvolvedPersonModel::class, 'personId');
	}

	public function workPositionData()
	{
		return $this->belongsTo(DBPositionModel::class, 'position');
	}
}
