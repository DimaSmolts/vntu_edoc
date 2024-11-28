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
		'lessonAssessmentCriteriaForA',
		'lessonAssessmentCriteriaForB',
		'lessonAssessmentCriteriaForC',
		'lessonAssessmentCriteriaForD',
		'lessonAssessmentCriteriaForE',
		'lessonAssessmentCriteriaForFX',
		'lessonAssessmentCriteriaForF',
		'courseworkAssessmentCriteriaForA',
		'courseworkAssessmentCriteriaForB',
		'courseworkAssessmentCriteriaForC',
		'courseworkAssessmentCriteriaForD',
		'courseworkAssessmentCriteriaForE',
		'courseworkAssessmentCriteriaForFX',
		'courseworkAssessmentCriteriaForF',
		'examAssessmentCriteriaForA',
		'examAssessmentCriteriaForB',
		'examAssessmentCriteriaForC',
		'examAssessmentCriteriaForD',
		'examAssessmentCriteriaForE',
		'examAssessmentCriteriaForFX',
		'examAssessmentCriteriaForF',
	];

	public $timestamps = false;

	public function workingProgram()
	{
		return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWorkingProgramId');
	}
}
