<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/src/controllers/WPController.php';
require_once __DIR__ . '/src/controllers/GlobalDataController.php';
require_once __DIR__ . '/src/controllers/PDFController.php';
require_once __DIR__ . '/src/controllers//api/WPApiController.php';
require_once __DIR__ . '/src/controllers//api/WorkingProgramGlobalDataOverwriteApiController.php';
require_once __DIR__ . '/src/controllers//api/WPInvolvedPersonApiController.php';
require_once __DIR__ . '/src/controllers//api/SemesterApiController.php';
require_once __DIR__ . '/src/controllers//api/ModuleApiController.php';
require_once __DIR__ . '/src/controllers//api/ThemeApiController.php';
require_once __DIR__ . '/src/controllers//api/LessonApiController.php';
require_once __DIR__ . '/src/controllers//api/EducationalFormLessonHoursApiController.php';
require_once __DIR__ . '/src/controllers//api/SemesterEducationFormApiController.php';
require_once __DIR__ . '/src/controllers//api/WorkingProgramLiteratureApiController.php';
require_once __DIR__ . '/src/controllers//api/EducationalFormCourseworkHoursApiController.php';
require_once __DIR__ . '/src/controllers//api/TeacherApiController.php';
require_once __DIR__ . '/src/controllers//api/FacultyApiController.php';
require_once __DIR__ . '/src/controllers//api/DepartmentApiController.php';
require_once __DIR__ . '/src/controllers//api/StydingLevelTypeApiController.php';
require_once __DIR__ . '/src/controllers//api/SpecialtyApiController.php';
require_once __DIR__ . '/src/controllers//api/EducationalProgramApiController.php';
require_once __DIR__ . '/src/controllers//api/SessionApiController.php';

use Bramus\Router\Router;
use App\Controllers\WPController;
use App\Controllers\GlobalDataController;
use App\Controllers\PDFController;
use App\Controllers\WPApiController;
use App\Controllers\WorkingProgramGlobalDataOverwriteApiController;
use App\Controllers\WPInvolvedPersonApiController;
use App\Controllers\SemesterApiController;
use App\Controllers\ModuleApiController;
use App\Controllers\ThemeApiController;
use App\Controllers\LessonApiController;
use App\Controllers\EducationalFormLessonHoursApiController;
use App\Controllers\SemesterEducationFormApiController;
use App\Controllers\WorkingProgramLiteratureApiController;
use App\Controllers\EducationalFormCourseworkHoursApiController;
use App\Controllers\TeacherApiController;
use App\Controllers\FacultyApiController;
use App\Controllers\DepartmentApiController;
use App\Controllers\StydingLevelTypeApiController;
use App\Controllers\SpecialtyApiController;
use App\Controllers\EducationalProgramApiController;
use App\Controllers\SessionApiController;

$router = new Router();

session_start();

$router->get('/api/teacherLogin', function () {
	$wpController = new SessionApiController();
	$wpController->teacherLogin();
});

$router->get('/api/studentLogin', function () {
	$wpController = new SessionApiController();
	$wpController->studentLogin();
});
$router->get('/api/getInfo', function () {
	$wpController = new SessionApiController();
	$wpController->getInfo();
});
$router->get('/api/logOut', function () {
	$wpController = new SessionApiController();
	$wpController->logOut();
});





$router->get('/wplist', function () {
	$wpController = new WPController();
	$wpController->getWPListItems();
});

$router->get('/wpdetails', function () {
	$wpController = new WPController();
	$wpController->getWPDetails();
});

$router->get('/globalWPData', function () {
	$globalDataController = new GlobalDataController();
	$globalDataController->getWorkingProgramGlobalData();
});

$router->get('/pdf', function () {
	$pdfController = new PDFController();
	$pdfController->getPDFData();
});

$router->get('/api/getThemes', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->getThemesWithLessonsByWPId();
});

$router->get('/api/getCoursework', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->getCoursework();
});

$router->get('/api/getLessonsAndExamingsStructure', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getLessonsAndExamingsStructure();
});

$router->get('/api/getPointsDistributionSlideContent', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getPointsDistributionSlideContent();
});

$router->get('/api/searchTeachers', function () {
	$teacherApiController = new TeacherApiController();
	$teacherApiController->searchTeachers();
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

$router->get('/api/getStydingLevelTypes', function () {
	$atydingLevelTypeApiController = new StydingLevelTypeApiController();
	$atydingLevelTypeApiController->getStydingLevelTypes();
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

$router->post('/api/duplicateWP', function () {
	$wpApiController = new WPApiController();
	$wpApiController->duplicateWP();
});

$router->post('/api/updateGlobalData', function () {
	$workingProgramGlobalDataOverwriteApiController = new WorkingProgramGlobalDataOverwriteApiController();
	$workingProgramGlobalDataOverwriteApiController->updateGlobalData();
});

$router->post('/api/updateWorkingProgramGlobalDataOverwrite', function () {
	$workingProgramGlobalDataOverwriteApiController = new WorkingProgramGlobalDataOverwriteApiController();
	$workingProgramGlobalDataOverwriteApiController->updateWorkingProgramGlobalDataOverwrite();
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

$router->post('/api/updateCourseworkAssesmentComponents', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->updateCourseworkAssesmentComponents();
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

$router->post('/api/updateCourseworkHours', function () {
	$educationalFormCourseworkHoursApiController = new EducationalFormCourseworkHoursApiController();
	$educationalFormCourseworkHoursApiController->updateEducationalFormCourseworkHours();
});

$router->post('/api/createSemesterEducationForm', function () {
	$semesterEducationFormApiController = new SemesterEducationFormApiController();
	$semesterEducationFormApiController->createSemesterEducationForm();
});

$router->post('/api/updateWPLiterature', function () {
	$workingProgramLiteratureApiController = new WorkingProgramLiteratureApiController();
	$workingProgramLiteratureApiController->updateWPLiterature();
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

$router->delete('/api/deleteCoursework', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->deleteCoursework();
});

$router->delete('/api/deleteColloquium', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->deleteColloquium();
});

$router->delete('/api/deleteLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->deleteLesson();
});

$router->run();
