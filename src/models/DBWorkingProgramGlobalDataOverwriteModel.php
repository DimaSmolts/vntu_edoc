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
		'practicalAssessmentCriteriaForFX',
		'practicalAssessmentCriteriaForF',
		'labAssessmentCriteriaForA',
		'labAssessmentCriteriaForB',
		'labAssessmentCriteriaForC',
		'labAssessmentCriteriaForD',
		'labAssessmentCriteriaForE',
		'labAssessmentCriteriaForFX',
		'labAssessmentCriteriaForF',
		'seminarAssessmentCriteriaForA',
		'seminarAssessmentCriteriaForB',
		'seminarAssessmentCriteriaForC',
		'seminarAssessmentCriteriaForD',
		'seminarAssessmentCriteriaForE',
		'seminarAssessmentCriteriaForFX',
		'seminarAssessmentCriteriaForF',
		'courseworkAssessmentCriteriaForA',
		'courseworkAssessmentCriteriaForB',
		'courseworkAssessmentCriteriaForC',
		'courseworkAssessmentCriteriaForD',
		'courseworkAssessmentCriteriaForE',
		'courseworkAssessmentCriteriaForFX',
		'courseworkAssessmentCriteriaForF',
		'colloquiumAssessmentCriteriaForA',
		'colloquiumAssessmentCriteriaForB',
		'colloquiumAssessmentCriteriaForC',
		'colloquiumAssessmentCriteriaForD',
		'colloquiumAssessmentCriteriaForE',
		'colloquiumAssessmentCriteriaForFX',
		'colloquiumAssessmentCriteriaForF',
	];

	public $timestamps = false;

	public function workingProgram()
	{
		return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWorkingProgramId');
	}
}
