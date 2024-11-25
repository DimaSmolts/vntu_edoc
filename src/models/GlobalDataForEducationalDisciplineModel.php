<?php

namespace App\Models;

require_once __DIR__ . '/AssessmentCriteriaModel.php';

use App\Models\AssessmentCriteriaModel;

class GlobalDataForEducationalDisciplineModel
{
	public ?string $universityName;
	public ?string $universityShortName;
	public ?string $academicRightsAndResponsibilities;
	public AssessmentCriteriaModel $generalAssessmentCriteria;
	public AssessmentCriteriaModel $lessonAssessmentCriteria;
	public AssessmentCriteriaModel $courseworkAssessmentCriteria;
	public AssessmentCriteriaModel $examAssessmentCriteria;

	public function __construct(
		?string $universityName = "",
		?string $universityShortName = "",
		?string $academicRightsAndResponsibilities = "",
		AssessmentCriteriaModel $generalAssessmentCriteria = new AssessmentCriteriaModel(),
		AssessmentCriteriaModel $lessonAssessmentCriteria = new AssessmentCriteriaModel(),
		AssessmentCriteriaModel $courseworkAssessmentCriteria = new AssessmentCriteriaModel(),
		AssessmentCriteriaModel $examAssessmentCriteria = new AssessmentCriteriaModel(),
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
