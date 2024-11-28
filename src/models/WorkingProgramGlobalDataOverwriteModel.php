<?php

namespace App\Models;

require_once __DIR__ . '/AssessmentCriteriaModel.php';

use App\Models\AssessmentCriteriaModel;

class WorkingProgramGlobalDataOverwriteModel
{
	public ?string $universityName;
	public ?string $universityShortName;
	public ?string $academicRightsAndResponsibilities;
	public ?AssessmentCriteriaModel $generalAssessmentCriteria;
	public ?AssessmentCriteriaModel $lessonAssessmentCriteria;
	public ?AssessmentCriteriaModel $courseworkAssessmentCriteria;
	public ?AssessmentCriteriaModel $examAssessmentCriteria;

	public function __construct(
		?string $universityName = "",
		?string $universityShortName = "",
		?string $academicRightsAndResponsibilities = "",
		?AssessmentCriteriaModel $generalAssessmentCriteria = null,
		?AssessmentCriteriaModel $lessonAssessmentCriteria = null,
		?AssessmentCriteriaModel $courseworkAssessmentCriteria = null,
		?AssessmentCriteriaModel $examAssessmentCriteria = null,
	) {
		$this->universityName = $universityName;
		$this->universityShortName = $universityShortName;
		$this->academicRightsAndResponsibilities = $academicRightsAndResponsibilities;
		$this->generalAssessmentCriteria = $generalAssessmentCriteria;
		$this->lessonAssessmentCriteria = $lessonAssessmentCriteria;
		$this->courseworkAssessmentCriteria = $courseworkAssessmentCriteria;
		$this->examAssessmentCriteria = $examAssessmentCriteria;
	}
}
