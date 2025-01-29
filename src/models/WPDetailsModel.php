<?php

namespace App\Models;

require_once __DIR__ . '/WPInvolvedPersonModel.php';
require_once __DIR__ . '/WorkingProgramGlobalDataModel.php';
require_once __DIR__ . '/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/LessonsAndExamingsStructureModel.php';
require_once __DIR__ . '/FacultyModel.php';
require_once __DIR__ . '/DepartmentModel.php';
require_once __DIR__ . '/StydingLevelTypeModel.php';
require_once __DIR__ . '/SubjectTypeModel.php';

use App\Models\WPInvolvedPersonModel;
use App\Models\WorkingProgramGlobalDataModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\LessonsAndExamingsStructureModel;
use App\Models\FacultyModel;
use App\Models\DepartmentModel;
use App\Models\StydingLevelTypeModel;
use App\Models\SubjectTypeModel;

class WPDetailsModel
{
	public int $id;
	public int $wpCreatorId;
	public ?int $regularYear;
	public ?int $academicYear;
	public ?int $facultyId;
	public ?int $departmentId;
	public ?string $disciplineName;
	public ?string $stydingLevelId;
	public ?string $subjectTypeId;
	public array $fieldsOfStudyIds;
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
	public ?int $modulesInWorkingProgramAmount;
	public array $semesters;
	public array $availableEducationalForms;
	public array $totalHoursForLections;
	public array $totalHoursForPracticals;
	public array $totalHoursForSeminars;
	public array $totalHoursForLabs;
	public array $totalHoursForSelfworks;
	public ?float $totalHoursAmountInWp;
	public array $createdByInvolvedPersonsIds;
	public array $createdByPersons;
	public ?WPInvolvedPersonModel $educationalProgramGuarantor;
	public ?WPInvolvedPersonModel $headOfDepartment;
	public ?WPInvolvedPersonModel $headOfCommission;
	public ?WPInvolvedPersonModel $approvedBy;
	public ?WPInvolvedPersonModel $docApprovedBy;
	public ?WorkingProgramGlobalDataModel $globalData;
	public ?WorkingProgramLiteratureModel $literature;
	public ?LessonsAndExamingsStructureModel $lessonsAndExamingsStructure;
	public ?FacultyModel $faculty;
	public ?DepartmentModel $department;
	public array $fieldsOfStudy;
	public array $specialties;
	public array $educationalPrograms;
	public ?StydingLevelTypeModel $stydingLevel;
	public ?SubjectTypeModel $subjectType;
	public array $assessmentCriterias;
	public array $specialtyWithEducationalProgramIds;

	public function __construct(
		int $id,
		int $wpCreatorId,
		?int $regularYear = null,
		?int $academicYear = null,
		?int $facultyId = null,
		?int $departmentId = null,
		?string $disciplineName = "",
		?string $stydingLevelId = "",
		?string $subjectTypeId = "",
		array $fieldsOfStudyIds = [],
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
		?int $modulesInWorkingProgramAmount = 0,
		array $semesters = [],
		array $availableEducationalForms = [],
		array $totalHoursForLections = [],
		array $totalHoursForPracticals = [],
		array $totalHoursForSeminars = [],
		array $totalHoursForLabs = [],
		array $totalHoursForSelfworks = [],
		?float $totalHoursAmountInWp = 0,
		array $createdByInvolvedPersonsIds = [],
		array $createdByPersons = [],
		?WPInvolvedPersonModel $educationalProgramGuarantor = null,
		?WPInvolvedPersonModel $headOfDepartment = null,
		?WPInvolvedPersonModel $headOfCommission = null,
		?WPInvolvedPersonModel $approvedBy = null,
		?WPInvolvedPersonModel $docApprovedBy = null,
		?WorkingProgramGlobalDataModel $globalData = null,
		?WorkingProgramLiteratureModel $literature = null,
		?LessonsAndExamingsStructureModel $lessonsAndExamingsStructure = null,
		?FacultyModel $faculty = null,
		?DepartmentModel $department = null,
		?array $fieldsOfStudy = [],
		?array $specialties = [],
		?array $educationalPrograms = [],
		?StydingLevelTypeModel $stydingLevel = null,
		?SubjectTypeModel $subjectType = null,
		array $assessmentCriterias = [],
		array $specialtyWithEducationalProgramIds = [],
	) {
		$this->id = $id;
		$this->wpCreatorId = $wpCreatorId;
		$this->regularYear = $regularYear;
		$this->academicYear = $academicYear;
		$this->facultyId = $facultyId;
		$this->departmentId = $departmentId;
		$this->disciplineName = $disciplineName;
		$this->stydingLevelId = $stydingLevelId;
		$this->subjectTypeId = $subjectTypeId;
		$this->fieldsOfStudyIds = $fieldsOfStudyIds;
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
		$this->modulesInWorkingProgramAmount = $modulesInWorkingProgramAmount;
		$this->semesters = $semesters;
		$this->availableEducationalForms = $availableEducationalForms;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->totalHoursForPracticals = $totalHoursForPracticals;
		$this->totalHoursForSeminars = $totalHoursForSeminars;
		$this->totalHoursForLabs = $totalHoursForLabs;
		$this->totalHoursForSelfworks = $totalHoursForSelfworks;
		$this->totalHoursAmountInWp = $totalHoursAmountInWp;
		$this->createdByInvolvedPersonsIds = $createdByInvolvedPersonsIds;
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
		$this->fieldsOfStudy = $fieldsOfStudy;
		$this->specialties = $specialties;
		$this->educationalPrograms = $educationalPrograms;
		$this->stydingLevel = $stydingLevel;
		$this->subjectType = $subjectType;
		$this->assessmentCriterias = $assessmentCriterias;
		$this->specialtyWithEducationalProgramIds = $specialtyWithEducationalProgramIds;
	}
}
