<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';
require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';
require_once __DIR__ . '/DBAssessmentCriteriaModel.php';
require_once __DIR__ . '/DBWorkingProgramLiteratureModel.php';
require_once __DIR__ . '/DBFacultyModel.php';
require_once __DIR__ . '/DBDepartmentModel.php';
require_once __DIR__ . '/DBStydingLevelTypeModel.php';
require_once __DIR__ . '/DBSubjectTypeModel.php';

use App\Models\DBEducationalDisciplineSemesterModel;
use App\Models\DBWorkingProgramInvolvedPersonModel;
use App\Models\DBAssessmentCriteriaModel;
use App\Models\DBWorkingProgramLiteratureModel;
use App\Models\DBFacultyModel;
use App\Models\DBDepartmentModel;
use App\Models\DBStydingLevelTypeModel;
use App\Models\DBSubjectTypeModel;

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
		'stydingLevelId',
		'subjectTypeId',
		'fieldsOfStudyIds',
		'specialtyIds',
		'educationalProgramIds',
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
		'wpCreatorId'
	];

	public $timestamps = false;

	public function semesters()
	{
		return $this->hasMany(DBEducationalDisciplineSemesterModel::class, 'educationalDisciplineWPId');
	}

	public function generalAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->where('isGeneral', true);
	}

	public function practicalAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('practical');
	}

	public function seminarAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('seminar');
	}

	public function laboratoryAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('laboratory');
	}

	public function courseworkAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('coursework');
	}

	public function courseProjectAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('courseProject');
	}

	public function calculationAndGraphicWorkAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('calculationAndGraphicWork');
	}

	public function calculationAndGraphicTaskAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('calculationAndGraphicTask');
	}

	public function colloquiumAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('colloquium');
	}

	public function controlWorkAssessmentCriteria()
	{
		return $this->hasOne(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('controlWork');
	}

	public function additionalTasksAssessmentCriterias()
	{
		return $this->hasMany(DBAssessmentCriteriaModel::class, 'educationalDisciplineWPId')
			->whereHas('additionalTask');
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

	public function educationalProgramGuarantor()
	{
		return $this->hasOne(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId')
			->whereHas('involvedRole', function ($query) {
				$query->where('role', 'educationalProgramGuarantor');
			});
	}

	public function headOfDepartment()
	{
		return $this->hasOne(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId')
			->whereHas('involvedRole', function ($query) {
				$query->where('role', 'headOfDepartment');
			});
	}

	public function headOfCommission()
	{
		return $this->hasOne(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId')
			->whereHas('involvedRole', function ($query) {
				$query->where('role', 'headOfCommission');
			});
	}

	public function approvedBy()
	{
		return $this->hasOne(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId')
			->whereHas('involvedRole', function ($query) {
				$query->where('role', 'approved');
			});
	}

	public function docApprovedBy()
	{
		return $this->hasOne(DBWorkingProgramInvolvedPersonModel::class, 'educationalDisciplineWPId')
			->whereHas('involvedRole', function ($query) {
				$query->where('role', 'docApproved');
			});
	}

	public function faculty()
	{
		return $this->belongsTo(DBFacultyModel::class, 'facultyId');
	}

	public function department()
	{
		return $this->belongsTo(DBDepartmentModel::class, 'departmentId');
	}

	public function stydingLevel()
	{
		return $this->belongsTo(DBStydingLevelTypeModel::class, 'stydingLevelId');
	}

	public function subjectType()
	{
		return $this->belongsTo(DBSubjectTypeModel::class, 'subjectTypeId');
	}

	public function creator()
	{
		return $this->belongsTo(DBTeacherModel::class, 'wpCreatorId');
	}
}
