<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';
require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';

use App\Models\DBEducationalDisciplineSemesterModel;
use App\Models\DBWorkingProgramInvolvedPersonModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalDisciplineWorkingProgramModel extends Model
{
	protected $table = 'educationalDisciplineWorkingProgram';
	protected $fillable = [
		'id',
		'createdAt',
		'regularYear',
		'academicYear',
		'facultyName',
		'departmentName',
		'disciplineName',
		'degreeName',
		'fielfOfStudyIdx',
		'fielfOfStudyName',
		'specialtyIdx',
		'specialtyName',
		'educationalProgram',
		'notes',
		'language',
		'prerequisites',
		'goal',
		'tasks',
		'competences',
		'programResults',
		'controlMeasures',
	];

	public $timestamps = false;

	public function semesters()
	{
		return $this->hasMany(DBEducationalDisciplineSemesterModel::class, 'educationalDisciplineWPId');
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
