<?php

namespace App\Models;

class GlobalWorkingProgramsDataModel
{
	public ?string $universityName;
	public ?string $universityShortName;
	public ?string $academicRightsAndResponsibilities;
	public ?string $generalAssessmentCriteriaForA;
	public ?string $generalAssessmentCriteriaForB;
	public ?string $generalAssessmentCriteriaForC;
	public ?string $generalAssessmentCriteriaForD;
	public ?string $generalAssessmentCriteriaForE;
	public ?string $generalAssessmentCriteriaForFX;
	public ?string $generalAssessmentCriteriaForF;
	public ?string $lessonAssessmentCriteriaForA;
	public ?string $lessonAssessmentCriteriaForB;
	public ?string $lessonAssessmentCriteriaForC;
	public ?string $lessonAssessmentCriteriaForD;
	public ?string $lessonAssessmentCriteriaForE;
	public ?string $lessonAssessmentCriteriaForFX;
	public ?string $lessonAssessmentCriteriaForF;
	public ?string $courseworkAssessmentCriteriaForA;
	public ?string $courseworkAssessmentCriteriaForB;
	public ?string $courseworkAssessmentCriteriaForC;
	public ?string $courseworkAssessmentCriteriaForD;
	public ?string $courseworkAssessmentCriteriaForE;
	public ?string $courseworkAssessmentCriteriaForFX;
	public ?string $courseworkAssessmentCriteriaForF;
	public ?string $examAssessmentCriteriaForA;
	public ?string $examAssessmentCriteriaForB;
	public ?string $examAssessmentCriteriaForC;
	public ?string $examAssessmentCriteriaForD;
	public ?string $examAssessmentCriteriaForE;
	public ?string $examAssessmentCriteriaForFX;
	public ?string $examAssessmentCriteriaForF;

	public function __construct(
		?string $universityName = "",
		?string $universityShortName = "",
		?string $academicRightsAndResponsibilities = "",
		?string $generalAssessmentCriteriaForA = "",
		?string $generalAssessmentCriteriaForB = "",
		?string $generalAssessmentCriteriaForC = "",
		?string $generalAssessmentCriteriaForD = "",
		?string $generalAssessmentCriteriaForE = "",
		?string $generalAssessmentCriteriaForFX = "",
		?string $generalAssessmentCriteriaForF = "",
		?string $lessonAssessmentCriteriaForA = "",
		?string $lessonAssessmentCriteriaForB = "",
		?string $lessonAssessmentCriteriaForC = "",
		?string $lessonAssessmentCriteriaForD = "",
		?string $lessonAssessmentCriteriaForE = "",
		?string $lessonAssessmentCriteriaForFX = "",
		?string $lessonAssessmentCriteriaForF = "",
		?string $courseworkAssessmentCriteriaForA = "",
		?string $courseworkAssessmentCriteriaForB = "",
		?string $courseworkAssessmentCriteriaForC = "",
		?string $courseworkAssessmentCriteriaForD = "",
		?string $courseworkAssessmentCriteriaForE = "",
		?string $courseworkAssessmentCriteriaForFX = "",
		?string $courseworkAssessmentCriteriaForF = "",
		?string $examAssessmentCriteriaForA = "",
		?string $examAssessmentCriteriaForB = "",
		?string $examAssessmentCriteriaForC = "",
		?string $examAssessmentCriteriaForD = "",
		?string $examAssessmentCriteriaForE = "",
		?string $examAssessmentCriteriaForFX = "",
		?string $examAssessmentCriteriaForF = "",
	) {
		$this->universityName = $universityName;
		$this->universityShortName = $universityShortName;
		$this->academicRightsAndResponsibilities = $academicRightsAndResponsibilities;
		$this->generalAssessmentCriteriaForA = $generalAssessmentCriteriaForA;
		$this->generalAssessmentCriteriaForB = $generalAssessmentCriteriaForB;
		$this->generalAssessmentCriteriaForC = $generalAssessmentCriteriaForC;
		$this->generalAssessmentCriteriaForD = $generalAssessmentCriteriaForD;
		$this->generalAssessmentCriteriaForE = $generalAssessmentCriteriaForE;
		$this->generalAssessmentCriteriaForFX = $generalAssessmentCriteriaForFX;
		$this->generalAssessmentCriteriaForF = $generalAssessmentCriteriaForF;
		$this->lessonAssessmentCriteriaForA = $lessonAssessmentCriteriaForA;
		$this->lessonAssessmentCriteriaForB = $lessonAssessmentCriteriaForB;
		$this->lessonAssessmentCriteriaForC = $lessonAssessmentCriteriaForC;
		$this->lessonAssessmentCriteriaForD = $lessonAssessmentCriteriaForD;
		$this->lessonAssessmentCriteriaForE = $lessonAssessmentCriteriaForE;
		$this->lessonAssessmentCriteriaForFX = $lessonAssessmentCriteriaForFX;
		$this->lessonAssessmentCriteriaForF = $lessonAssessmentCriteriaForF;
		$this->courseworkAssessmentCriteriaForA = $courseworkAssessmentCriteriaForA;
		$this->courseworkAssessmentCriteriaForB = $courseworkAssessmentCriteriaForB;
		$this->courseworkAssessmentCriteriaForC = $courseworkAssessmentCriteriaForC;
		$this->courseworkAssessmentCriteriaForD = $courseworkAssessmentCriteriaForD;
		$this->courseworkAssessmentCriteriaForE = $courseworkAssessmentCriteriaForE;
		$this->courseworkAssessmentCriteriaForFX = $courseworkAssessmentCriteriaForFX;
		$this->courseworkAssessmentCriteriaForF = $courseworkAssessmentCriteriaForF;
		$this->examAssessmentCriteriaForA = $examAssessmentCriteriaForA;
		$this->examAssessmentCriteriaForB = $examAssessmentCriteriaForB;
		$this->examAssessmentCriteriaForC = $examAssessmentCriteriaForC;
		$this->examAssessmentCriteriaForD = $examAssessmentCriteriaForD;
		$this->examAssessmentCriteriaForE = $examAssessmentCriteriaForE;
		$this->examAssessmentCriteriaForFX = $examAssessmentCriteriaForFX;
		$this->examAssessmentCriteriaForF = $examAssessmentCriteriaForF;
	}
}
