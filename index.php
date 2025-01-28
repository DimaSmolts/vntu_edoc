<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/src/controllers/WPController.php';
require_once __DIR__ . '/src/controllers/GlobalDataController.php';
require_once __DIR__ . '/src/controllers/PDFController.php';
require_once __DIR__ . '/src/controllers/api/WPApiController.php';
require_once __DIR__ . '/src/controllers/api/WorkingProgramGlobalDataApiController.php';
require_once __DIR__ . '/src/controllers/api/AssessmentCriteriaApiController.php';
require_once __DIR__ . '/src/controllers/api/WPInvolvedPersonApiController.php';
require_once __DIR__ . '/src/controllers/api/SemesterApiController.php';
require_once __DIR__ . '/src/controllers/api/ModuleApiController.php';
require_once __DIR__ . '/src/controllers/api/ThemeApiController.php';
require_once __DIR__ . '/src/controllers/api/LessonApiController.php';
require_once __DIR__ . '/src/controllers/api/EducationalFormLessonHoursApiController.php';
require_once __DIR__ . '/src/controllers/api/SemesterEducationFormApiController.php';
require_once __DIR__ . '/src/controllers/api/WorkingProgramLiteratureApiController.php';
require_once __DIR__ . '/src/controllers/api/TeacherApiController.php';
require_once __DIR__ . '/src/controllers/api/FacultyApiController.php';
require_once __DIR__ . '/src/controllers/api/DepartmentApiController.php';
require_once __DIR__ . '/src/controllers/api/StydingLevelTypeApiController.php';
require_once __DIR__ . '/src/controllers/api/SpecialtyApiController.php';
require_once __DIR__ . '/src/controllers/api/EducationalProgramApiController.php';
require_once __DIR__ . '/src/controllers/api/ExamTypeApiController.php';
require_once __DIR__ . '/src/controllers/api/TaskApiController.php';
require_once __DIR__ . '/src/controllers/api/FieldOfStudyApiController.php';
require_once __DIR__ . '/src/controllers/api/SubjectTypeApiController.php';
require_once __DIR__ . '/src/controllers/api/SessionApiController.php';

use Bramus\Router\Router;
use App\Controllers\WPController;
use App\Controllers\GlobalDataController;
use App\Controllers\PDFController;
use App\Controllers\WPApiController;
use App\Controllers\WorkingProgramGlobalDataApiController;
use App\Controllers\AssessmentCriteriaApiController;
use App\Controllers\WPInvolvedPersonApiController;
use App\Controllers\SemesterApiController;
use App\Controllers\ModuleApiController;
use App\Controllers\ThemeApiController;
use App\Controllers\LessonApiController;
use App\Controllers\EducationalFormLessonHoursApiController;
use App\Controllers\SemesterEducationFormApiController;
use App\Controllers\WorkingProgramLiteratureApiController;
use App\Controllers\TeacherApiController;
use App\Controllers\FacultyApiController;
use App\Controllers\DepartmentApiController;
use App\Controllers\StydingLevelTypeApiController;
use App\Controllers\SpecialtyApiController;
use App\Controllers\EducationalProgramApiController;
use App\Controllers\ExamTypeApiController;
use App\Controllers\TaskApiController;
use App\Controllers\FieldOfStudyApiController;
use App\Controllers\SubjectTypeApiController;
use App\Controllers\SessionApiController;

$router = new Router();

session_start();

$router->get('/api/teacherLogin', function () {
	$sessionApiController = new SessionApiController();
	$sessionApiController->teacherLogin();
});

$router->get('/api/studentLogin', function () {
	$sessionApiController = new SessionApiController();
	$sessionApiController->studentLogin();
});

$router->get('/api/getInfo', function () {
	$sessionApiController = new SessionApiController();
	$sessionApiController->getInfo();
});

$router->get('/api/logOut', function () {
	$sessionApiController = new SessionApiController();
	$sessionApiController->logOut();
});





$router->get('/wplist', function () {
	$wpController = new WPController();
	$wpController->getWPListItems();
});

$router->get('/wpdetails', function () {
	$wpController = new WPController();
	$wpController->getWPDetails();
});

$router->get('/api/getDataForValidation', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getDataForValidation();
});

$router->get('/globalWPData', function () {
	$globalDataController = new GlobalDataController();
	$globalDataController->getWorkingProgramGlobalData();
});

$router->get('/pdf', function () {
	$pdfController = new PDFController();
	$pdfController->getPDFData();
});

$router->get('/api/getCourseworkAndProject', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->getCourseworkAndProject();
});

$router->get('/api/getLessonsAndExamingsStructure', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getLessonsAndExamingsStructure();
});

$router->get('/api/getPointsDistributionSlideContent', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getPointsDistributionSlideContent();
});

$router->get('/api/getEducationalDisciplineSemesterControlMethodsContent', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getEducationalDisciplineSemesterControlMethodsContent();
});

$router->get('/api/getSelfworkContent', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getSelfworkContent();
});

$router->get('/api/getEducationalDisciplineStructure', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getEducationalDisciplineStructure();
});

$router->get('/api/searchTeachers', function () {
	$teacherApiController = new TeacherApiController();
	$teacherApiController->searchTeachers();
});

$router->get('/api/searchTeacherById', function () {
	$teacherApiController = new TeacherApiController();
	$teacherApiController->searchTeacherById();
});

$router->get('/api/searchTeachersByIds', function () {
	$teacherApiController = new TeacherApiController();
	$teacherApiController->searchTeachersByIds();
});

$router->get('/api/getFaculties', function () {
	$facultyApiController = new FacultyApiController();
	$facultyApiController->getFaculties();
});

$router->get('/api/searchDepartments', function () {
	$departmentApiController = new DepartmentApiController();
	$departmentApiController->searchDepartments();
});

$router->get('/api/searchDepartmentsById', function () {
	$departmentApiController = new DepartmentApiController();
	$departmentApiController->searchDepartmentsById();
});

$router->get('/api/searchAdditionalTasks', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->searchAdditionalTasks();
});

$router->get('/api/searchFieldsOfStudy', function () {
	$fieldOfStudyApiController = new FieldOfStudyApiController();
	$fieldOfStudyApiController->searchFieldsOfStudy();
});

$router->get('/api/getStydingLevelTypes', function () {
	$stydingLevelTypeApiController = new StydingLevelTypeApiController();
	$stydingLevelTypeApiController->getStydingLevelTypes();
});

$router->get('/api/getSubjectTypes', function () {
	$subjectTypeApiController = new SubjectTypeApiController();
	$subjectTypeApiController->getSubjectTypes();
});

$router->get('/api/searchSpecialties', function () {
	$specialtyApiController = new SpecialtyApiController();
	$specialtyApiController->searchSpecialties();
});

$router->get('/api/searchSpecialtiesByIds', function () {
	$specialtyApiController = new SpecialtyApiController();
	$specialtyApiController->searchSpecialtiesByIds();
});

$router->get('/api/searchEducationalPrograms', function () {
	$educationalProgramApiController = new EducationalProgramApiController();
	$educationalProgramApiController->searchEducationalPrograms();
});

$router->get('/api/searchEducationalProgramsByIds', function () {
	$educationalProgramApiController = new EducationalProgramApiController();
	$educationalProgramApiController->searchEducationalProgramsByIds();
});

$router->get('/api/getExamTypes', function () {
	$examTypeApiController = new ExamTypeApiController();
	$examTypeApiController->getExamTypes();
});

$router->post('/api/duplicateWP', function () {
	$wpApiController = new WPApiController();
	$wpApiController->duplicateWP();
});

$router->post('/api/updateGlobalData', function () {
	$workingProgramGlobalDataApiController = new WorkingProgramGlobalDataApiController();
	$workingProgramGlobalDataApiController->updateGlobalData();
});

$router->post('/api/updateAssessmentCriteria', function () {
	$assessmentCriteriaApiController = new AssessmentCriteriaApiController();
	$assessmentCriteriaApiController->updateAssessmentCriteria();
});

$router->post('/api/updateDefaultAssessmentCriteria', function () {
	$assessmentCriteriaApiController = new AssessmentCriteriaApiController();
	$assessmentCriteriaApiController->updateDefaultAssessmentCriteria();
});

$router->post('/api/createNewWP', function () {
	$wpApiController = new WPApiController();
	$wpApiController->createNewWP();
});

$router->post('/api/updateWPDetails', function () {
	$wpApiController = new WPApiController();
	$wpApiController->updateWPDetails();
});

$router->post('/api/updateWPInvolvedPerson', function () {
	$involvedPersonApiController = new WPInvolvedPersonApiController();
	$involvedPersonApiController->updateWorkingProgramInvolvedPerson();
});

$router->post('/api/updateWPInvolvedPersonDetails', function () {
	$involvedPersonApiController = new WPInvolvedPersonApiController();
	$involvedPersonApiController->updateWorkingProgramInvolvedPersonDetails();
});

$router->post('/api/createNewSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->createNewSemester();
});

$router->post('/api/updateSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->updateSemester();
});

$router->post('/api/createIndividualTask', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->createIndividualTask();
});

$router->post('/api/createNewAdditionalTasks', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->createNewAdditionalTasks();
});

$router->post('/api/createNewFieldOfStudy', function () {
	$fieldOfStudyApiController = new FieldOfStudyApiController();
	$fieldOfStudyApiController->createNewFieldOfStudy();
});

$router->post('/api/createModuleTask', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->createModuleTask();
});

$router->post('/api/updateAssesmentComponents', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->updateAssesmentComponents();
});

$router->post('/api/updateModuleTaskPoints', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->updateModuleTaskPoints();
});

$router->post('/api/updateTaskPointsById', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->updateTaskPointsById();
});

$router->post('/api/createNewModule', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->createNewModule();
});

$router->post('/api/updateModule', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->updateModule();
});

$router->post('/api/createNewTheme', function () {
	$moduleApiController = new ThemeApiController();
	$moduleApiController->createNewTheme();
});

$router->post('/api/updateTheme', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->updateTheme();
});

$router->post('/api/createNewLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->createNewLesson();
});

$router->post('/api/updateLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->updateLesson();
});

$router->post('/api/updateHours', function () {
	$educationalFormLessonHoursApiController = new EducationalFormLessonHoursApiController();
	$educationalFormLessonHoursApiController->updateEducationalFormLessonHours();
});

$router->post('/api/createSemesterEducationForm', function () {
	$semesterEducationFormApiController = new SemesterEducationFormApiController();
	$semesterEducationFormApiController->createSemesterEducationForm();
});

$router->post('/api/updateWPLiterature', function () {
	$workingProgramLiteratureApiController = new WorkingProgramLiteratureApiController();
	$workingProgramLiteratureApiController->updateWPLiterature();
});

$router->post('/api/updateTaskHours', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->updateTaskHours();
});

$router->post('/api/updateLessonSelfworkHours', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->updateLessonSelfworkHours();
});

$router->post('/api/createNewSelfworkTheme', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->createNewSelfworkTheme();
});

$router->post('/api/updateSelfworkTheme', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->updateSelfworkTheme();
});

$router->post('/api/updateSelfworkHours', function () {
	$educationalFormLessonHoursApiController = new EducationalFormLessonHoursApiController();
	$educationalFormLessonHoursApiController->updateSelfworkHours();
});

$router->delete('/api/deleteTheme', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->deleteTheme();
});

$router->delete('/api/deleteModule', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->deleteModule();
});

$router->delete('/api/deleteSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->deleteSemester();
});

$router->delete('/api/deleteSemesterEducationForm', function () {
	$semesterEducationFormApiController = new SemesterEducationFormApiController();
	$semesterEducationFormApiController->deleteSemesterEducationForm();
});

$router->delete('/api/deleteIndividualTask', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->deleteIndividualTask();
});

$router->delete('/api/deleteModuleTask', function () {
	$taskApiController = new TaskApiController();
	$taskApiController->deleteModuleTask();
});

$router->delete('/api/deleteLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->deleteLesson();
});

$router->delete('/api/deleteAllLessonsByType', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->deleteAllLessonsByType();
});

$router->delete('/api/deleteWPInvolvedPerson', function () {
	$involvedPersonApiController = new WPInvolvedPersonApiController();
	$involvedPersonApiController->deleteWPInvolvedPerson();
});

$router->delete('/api/deleteSelfworkTheme', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->deleteSelfworkTheme();
});

$router->run();
