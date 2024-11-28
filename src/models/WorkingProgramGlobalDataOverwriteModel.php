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
	public ?AssessmentCriteriaModel $practicalAssessmentCriteria;
	public ?AssessmentCriteriaModel $labAssessmentCriteria;
	public ?AssessmentCriteriaModel $seminarAssessmentCriteria;
	public ?AssessmentCriteriaModel $courseworkAssessmentCriteria;
	public ?AssessmentCriteriaModel $colloquiumAssessmentCriteria;

	public function __construct(
		?string $universityName = "",
		?string $universityShortName = "",
		?string $academicRightsAndResponsibilities = "",
		?AssessmentCriteriaModel $generalAssessmentCriteria = null,
		?AssessmentCriteriaModel $practicalAssessmentCriteria = null,
		?AssessmentCriteriaModel $labAssessmentCriteria = null,
		?AssessmentCriteriaModel $seminarAssessmentCriteria = null,
		?AssessmentCriteriaModel $courseworkAssessmentCriteria = null,
		?AssessmentCriteriaModel $colloquiumAssessmentCriteria = null,
	) {
		$this->universityName = $universityName;
		$this->universityShortName = $universityShortName;
		$this->academicRightsAndResponsibilities = $academicRightsAndResponsibilities;
		$this->generalAssessmentCriteria = $generalAssessmentCriteria;
		$this->practicalAssessmentCriteria = $practicalAssessmentCriteria;
		$this->labAssessmentCriteria = $labAssessmentCriteria;
		$this->seminarAssessmentCriteria = $seminarAssessmentCriteria;
		$this->courseworkAssessmentCriteria = $courseworkAssessmentCriteria;
		$this->colloquiumAssessmentCriteria = $colloquiumAssessmentCriteria;
	}
}
