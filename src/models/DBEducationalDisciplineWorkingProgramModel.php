<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';
require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';
require_once __DIR__ . '/DBWorkingProgramGlobalDataOverwriteModel.php';
require_once __DIR__ . '/DBWorkingProgramLiteratureModel.php';

use App\Models\DBEducationalDisciplineSemesterModel;
use App\Models\DBWorkingProgramInvolvedPersonModel;
use App\Models\DBWorkingProgramGlobalDataOverwriteModel;
use App\Models\DBWorkingProgramLiteratureModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalDisciplineWorkingProgramModel extends Model
{
	protected $table = 'educationalDisciplineWorkingProgram';
	protected $fillable = [
		'id',
		'createdAt',
		'regularYear',
		'academicYear',
		'facultyId',
		'departmentId',
		'disciplineName',
		'degreeName',
		'fielfOfStudyIdx',
		'fielfOfStudyName',
		'specialtyIdx',
		'specialtyName',
		'educationalProgram',
		'notes',
		'prerequisites',
		'goal',
		'tasks',
		'competences',
		'programResults',
		'controlMeasures',
		'studingMethods',
		'examingMethods',
		'code',
		'methodologicalSupport',
		'individualTaskNotes',
		'creditsAmount',
		'pointsDistribution'
	];

	public $timestamps = false;

	public function semesters()
	{
		return $this->hasMany(DBEducationalDisciplineSemesterModel::class, 'educationalDisciplineWPId');
	}

	public function globalData()
	{
		return $this->hasOne(DBWorkingProgramGlobalDataOverwriteModel::class, 'educationalDisciplineWorkingProgramId');
	}

	public function literature()
	{
		return $this->hasOne(DBWorkingProgramLiteratureModel::class, 'educationalDisciplineWorkingProgramId');
	}

	public function involvedPersons()
	{
		return $this->hasMany(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId');
	}

	public function createdByPersons()
	{
		return $this->hasMany(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId')
			->whereHas('involvedRole', function ($query) {
				$query->where('role', 'created');
			});
	}
}
