<?php

namespace App\Models;

require_once __DIR__ . '/DBTaskTypeModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';
require_once __DIR__ . '/DBEducationalFormTaskHoursModel.php';
require_once __DIR__ . '/DBModuleModel.php';

use App\Models\DBTaskTypeModel;
use App\Models\DBEducationalDisciplineSemesterModel;
use App\Models\DBEducationalFormTaskHoursModel;
use App\Models\DBModuleModel;

use Illuminate\Database\Eloquent\Model;

class DBTaskDetailsModel extends Model
{
	protected $table = 'taskDetails';
	protected $fillable = ['taskTypeId', 'assessmentComponents', 'semesterId', 'moduleId'];

	public $timestamps = false;

	public function taskType()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId');
	}

	public function semester()
	{
		return $this->belongsTo(DBEducationalDisciplineSemesterModel::class, 'semesterId');
	}

	public function modules()
	{
		return $this->belongsTo(DBModuleModel::class, 'moduleId');
	}

	public function educationalFormTaskHours()
	{
		return $this->hasOne(DBEducationalFormTaskHoursModel::class, 'taskDetailsId');
	}
}
