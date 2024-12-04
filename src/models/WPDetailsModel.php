<?php

namespace App\Models;

require_once __DIR__ . '/WorkingProgramGlobalDataOverwriteModel.php';
require_once __DIR__ . '/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/LessonsAndExamingsStructureModel.php';

use App\Models\WorkingProgramGlobalDataOverwriteModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\LessonsAndExamingsStructureModel;

class WPDetailsModel
{
	public int $id;
	public ?int $regularYear;
	public ?int $academicYear;
	public ?string $facultyName;
	public ?string $departmentName;
	public ?string $disciplineName;
	public ?string $degreeName;
	public ?string $fielfOfStudyIdx;
	public ?string $fielfOfStudyName;
	public ?string $specialtyIdx;
	public ?string $specialtyName;
	public ?string $educationalProgram;
	public ?string $notes;
	public ?string $prerequisites;
	public ?string $goal;
	public ?string $tasks;
	public ?string $competences;
	public ?string $programResults;
	public ?string $controlMeasures;
	public ?string $studingMethods;
	public ?string $examingMethods;
	public ?string $code;
	public ?string $methodologicalSupport;
	public ?string $individualTaskNotes;
	public ?int $creditsAmount;
	public ?string $pointsDistribution;
	public ?int $modulesInWorkingProgramAmount;
	public array $semesters;
	public array $createdByPersons;
	public array $availableEducationalForms;
	public array $totalHoursForLections;
	public array $totalHoursForPracticals;
	public array $totalHoursForSeminars;
	public array $totalHoursForLabs;
	public array $totalHoursForSelfworks;
	public ?WorkingProgramGlobalDataOverwriteModel $globalData;
	public ?WorkingProgramLiteratureModel $literature;
	public ?LessonsAndExamingsStructureModel $lessonsAndExamingsStructure;

	public function __construct(
		int $id,
		?int $regularYear = null,
		?int $academicYear = null,
		?string $facultyName = "",
		?string $departmentName = "",
		?string $disciplineName = "",
		?string $degreeName = "",
		?string $fielfOfStudyIdx = "",
		?string $fielfOfStudyName = "",
		?string $specialtyIdx = "",
		?string $specialtyName = "",
		?string $educationalProgram = "",
		?string $notes = "",
		?string $prerequisites = "",
		?string $goal = "",
		?string $tasks = "",
		?string $competences = "",
		?string $programResults = "",
		?string $controlMeasures = "",
		?string $studingMethods = "",
		?string $examingMethods = "",
		?string $code = "",
		?string $methodologicalSupport = "",
		?string $individualTaskNotes = "",
		?int $creditsAmount = null,
		?string $pointsDistribution = "",
		?int $modulesInWorkingProgramAmount = 0,
		array $semesters = [],
		array $createdByPersons = [],
		array $availableEducationalForms = [],
		array $totalHoursForLections = [],
		array $totalHoursForPracticals = [],
		array $totalHoursForSeminars = [],
		array $totalHoursForLabs = [],
		array $totalHoursForSelfworks = [],
		?WorkingProgramGlobalDataOverwriteModel $globalData = null,
		?WorkingProgramLiteratureModel $literature = null,
		?LessonsAndExamingsStructureModel $lessonsAndExamingsStructure = null,
	) {
		$this->id = $id;
		$this->regularYear = $regularYear;
		$this->academicYear = $academicYear;
		$this->facultyName = $facultyName;
		$this->departmentName = $departmentName;
		$this->disciplineName = $disciplineName;
		$this->degreeName = $degreeName;
		$this->fielfOfStudyIdx = $fielfOfStudyIdx;
		$this->fielfOfStudyName = $fielfOfStudyName;
		$this->specialtyIdx = $specialtyIdx;
		$this->specialtyName = $specialtyName;
		$this->educationalProgram = $educationalProgram;
		$this->notes = $notes;
		$this->prerequisites = $prerequisites;
		$this->goal = $goal;
		$this->tasks = $tasks;
		$this->competences = $competences;
		$this->programResults = $programResults;
		$this->controlMeasures = $controlMeasures;
		$this->studingMethods = $studingMethods;
		$this->examingMethods = $examingMethods;
		$this->code = $code;
		$this->methodologicalSupport = $methodologicalSupport;
		$this->individualTaskNotes = $individualTaskNotes;
		$this->creditsAmount = $creditsAmount;
		$this->pointsDistribution = $pointsDistribution;
		$this->modulesInWorkingProgramAmount = $modulesInWorkingProgramAmount;
		$this->semesters = $semesters;
		$this->createdByPersons = $createdByPersons;
		$this->availableEducationalForms = $availableEducationalForms;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->totalHoursForPracticals = $totalHoursForPracticals;
		$this->totalHoursForSeminars = $totalHoursForSeminars;
		$this->totalHoursForLabs = $totalHoursForLabs;
		$this->totalHoursForSelfworks = $totalHoursForSelfworks;
		$this->globalData = $globalData;
		$this->literature = $literature;
		$this->lessonsAndExamingsStructure = $lessonsAndExamingsStructure;
	}
}
