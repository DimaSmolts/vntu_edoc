<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';

use App\Models\DBEducationalDisciplineWorkingProgramModel;

use Illuminate\Database\Eloquent\Model;

class DBWorkingProgramGlobalDataOverwriteModel extends Model
{
	protected $table = 'workingProgramGlobalDataOverwrite';
	protected $fillable = [
		'educationalDisciplineWorkingProgramId',
		'universityName',
		'universityShortName',
		'academicRightsAndResponsibilities',
		'generalAssessmentCriteriaForA',
		'generalAssessmentCriteriaForB',
		'generalAssessmentCriteriaForC',
		'generalAssessmentCriteriaForD',
		'generalAssessmentCriteriaForE',
		'generalAssessmentCriteriaForFX',
		'generalAssessmentCriteriaForF',
		'practicalAssessmentCriteriaForA',
		'practicalAssessmentCriteriaForB',
		'practicalAssessmentCriteriaForC',
		'practicalAssessmentCriteriaForD',
		'practicalAssessmentCriteriaForE',
		'practicalAssessmentCriteriaForFXAndF',
		'labAssessmentCriteriaForA',
		'labAssessmentCriteriaForB',
		'labAssessmentCriteriaForC',
		'labAssessmentCriteriaForD',
		'labAssessmentCriteriaForE',
		'labAssessmentCriteriaForFXAndF',
		'seminarAssessmentCriteriaForA',
		'seminarAssessmentCriteriaForB',
		'seminarAssessmentCriteriaForC',
		'seminarAssessmentCriteriaForD',
		'seminarAssessmentCriteriaForE',
		'seminarAssessmentCriteriaForFXAndF',
		'courseworkAssessmentCriteriaForA',
		'courseworkAssessmentCriteriaForB',
		'courseworkAssessmentCriteriaForC',
		'courseworkAssessmentCriteriaForD',
		'courseworkAssessmentCriteriaForE',
		'courseworkAssessmentCriteriaForFXAndF',
		'colloquiumAssessmentCriteriaForA',
		'colloquiumAssessmentCriteriaForB',
		'colloquiumAssessmentCriteriaForC',
		'colloquiumAssessmentCriteriaForD',
		'colloquiumAssessmentCriteriaForE',
		'colloquiumAssessmentCriteriaForFXAndF',
	];

	public $timestamps = false;

	public function workingProgram()
	{
		return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWorkingProgramId');
	}
}
