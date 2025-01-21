<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';
require_once __DIR__ . '/DBLessonTypeModel.php';
require_once __DIR__ . '/DBTaskTypeModel.php';

use App\Models\DBEducationalDisciplineWorkingProgramModel;
use App\Models\DBLessonTypeModel;
use App\Models\DBTaskTypeModel;

use Illuminate\Database\Eloquent\Model;

class DBAssessmentCriteriaModel extends Model
{
	protected $table = 'assessmentCriterias';
	protected $fillable = [
		'id',
		'educationalDisciplineWPId',
		'lessonTypeId',
		'taskTypeId',
		'isGeneral',
		'A',
		'B',
		'C',
		'D',
		'E',
		'FX',
		'F',
		'FXAndF',
		'isAdditionalTask'
	];

	public $timestamps = false;

	public function workingProgram()
	{
		return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWPId');
	}

	public function practical()
	{
		return $this->belongsTo(DBLessonTypeModel::class, 'lessonTypeId')
			->where('id', 2);
	}

	public function seminar()
	{
		return $this->belongsTo(DBLessonTypeModel::class, 'lessonTypeId')
			->where('id', 3);
	}

	public function laboratory()
	{
		return $this->belongsTo(DBLessonTypeModel::class, 'lessonTypeId')
			->where('id', 4);
	}

	public function coursework()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', 1);
	}

	public function courseProject()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', 2);
	}

	public function calculationAndGraphicWork()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', 3);
	}

	public function calculationAndGraphicTask()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', 4);
	}

	public function colloquium()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', 5);
	}

	public function controlWork()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', 6);
	}

	public function additionalTask()
	{
		return $this->belongsTo(DBTaskTypeModel::class, 'taskTypeId')
			->where('id', '>', 6);
	}
}
