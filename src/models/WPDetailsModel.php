<?php

namespace App\Models;

require_once __DIR__ . '/WPInvolvedPersonModel.php';
require_once __DIR__ . '/WorkingProgramGlobalDataOverwriteModel.php';
require_once __DIR__ . '/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/LessonsAndExamingsStructureModel.php';
require_once __DIR__ . '/FacultyModel.php';
require_once __DIR__ . '/DepartmentModel.php';

use App\Models\WPInvolvedPersonModel;
use App\Models\WorkingProgramGlobalDataOverwriteModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\LessonsAndExamingsStructureModel;
use App\Models\FacultyModel;
use App\Models\DepartmentModel;

class WPDetailsModel
{
	public int $id;
	public ?int $regularYear;
	public ?int $academicYear;
	public ?int $facultyId;
	public ?int $departmentId;
	public ?string $disciplineName;
	public ?string $stydingLevelId;
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
	public array $availableEducationalForms;
	public array $totalHoursForLections;
	public array $totalHoursForPracticals;
	public array $totalHoursForSeminars;
	public array $totalHoursForLabs;
	public array $totalHoursForSelfworks;
	public array $createdByPersons;
	public ?WPInvolvedPersonModel $educationalProgramGuarantor;
	public ?WPInvolvedPersonModel $headOfDepartment;
	public ?WPInvolvedPersonModel $headOfCommission;
	public ?WPInvolvedPersonModel $approvedBy;
	public ?WPInvolvedPersonModel $docApprovedBy;
	public ?WorkingProgramGlobalDataOverwriteModel $globalData;
	public ?WorkingProgramLiteratureModel $literature;
	public ?LessonsAndExamingsStructureModel $lessonsAndExamingsStructure;
	public ?FacultyModel $faculty;
	public ?DepartmentModel $department;

	public function __construct(
		int $id,
		?int $regularYear = null,
		?int $academicYear = null,
		?int $facultyId = null,
		?int $departmentId = null,
		?string $disciplineName = "",
		?string $stydingLevelId = "",
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
		array $availableEducationalForms = [],
		array $totalHoursForLections = [],
		array $totalHoursForPracticals = [],
		array $totalHoursForSeminars = [],
		array $totalHoursForLabs = [],
		array $totalHoursForSelfworks = [],
		array $createdByPersons = [],
		?WPInvolvedPersonModel $educationalProgramGuarantor = null,
		?WPInvolvedPersonModel $headOfDepartment = null,
		?WPInvolvedPersonModel $headOfCommission = null,
		?WPInvolvedPersonModel $approvedBy = null,
		?WPInvolvedPersonModel $docApprovedBy = null,
		?WorkingProgramGlobalDataOverwriteModel $globalData = null,
		?WorkingProgramLiteratureModel $literature = null,
		?LessonsAndExamingsStructureModel $lessonsAndExamingsStructure = null,
		?FacultyModel $faculty = null,
		?DepartmentModel $department = null
	) {
		$this->id = $id;
		$this->regularYear = $regularYear;
		$this->academicYear = $academicYear;
		$this->facultyId = $facultyId;
		$this->departmentId = $departmentId;
		$this->disciplineName = $disciplineName;
		$this->stydingLevelId = $stydingLevelId;
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
		$this->availableEducationalForms = $availableEducationalForms;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->totalHoursForPracticals = $totalHoursForPracticals;
		$this->totalHoursForSeminars = $totalHoursForSeminars;
		$this->totalHoursForLabs = $totalHoursForLabs;
		$this->totalHoursForSelfworks = $totalHoursForSelfworks;
		$this->createdByPersons = $createdByPersons;
		$this->educationalProgramGuarantor = $educationalProgramGuarantor;
		$this->headOfDepartment = $headOfDepartment;
		$this->headOfCommission = $headOfCommission;
		$this->approvedBy = $approvedBy;
		$this->docApprovedBy = $docApprovedBy;
		$this->globalData = $globalData;
		$this->literature = $literature;
		$this->lessonsAndExamingsStructure = $lessonsAndExamingsStructure;
		$this->faculty = $faculty;
		$this->department = $department;
	}
}
