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
require_once __DIR__ . '/src/controllers/api/WorkingProgramGlobalDataOverwriteApiController.php';
require_once __DIR__ . '/src/controllers/api/WPInvolvedPersonApiController.php';
require_once __DIR__ . '/src/controllers/api/SemesterApiController.php';
require_once __DIR__ . '/src/controllers/api/ModuleApiController.php';
require_once __DIR__ . '/src/controllers/api/ThemeApiController.php';
require_once __DIR__ . '/src/controllers/api/LessonApiController.php';
require_once __DIR__ . '/src/controllers/api/EducationalFormLessonHoursApiController.php';
require_once __DIR__ . '/src/controllers/api/SemesterEducationFormApiController.php';
require_once __DIR__ . '/src/controllers/api/WorkingProgramLiteratureApiController.php';
require_once __DIR__ . '/src/controllers/api/EducationalFormCourseworkHoursApiController.php';
require_once __DIR__ . '/src/controllers/api/TeacherApiController.php';
require_once __DIR__ . '/src/controllers/api/FacultyApiController.php';
require_once __DIR__ . '/src/controllers/api/SessionApiController.php';

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
use App\Controllers\SessionApiController;

$router = new Router();

session_start();

$router->get('/teacherLogin', function () {
	$wpController = new SessionApiController();
	$wpController->teacherLogin();
});

$router->get('/studentLogin', function () {
	$wpController = new SessionApiController();
	$wpController->studentLogin();
});
$router->get('/getInfo', function () {
	$wpController = new SessionApiController();
	$wpController->getInfo();
});
$router->get('/logOut', function () {
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

$router->get('/getThemes', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->getThemesWithLessonsByWPId();
});

$router->get('/getCoursework', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->getCoursework();
});

$router->get('/getLessonsAndExamingsStructure', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getLessonsAndExamingsStructure();
});

$router->get('/getPointsDistributionSlideContent', function () {
	$wpApiController = new WPApiController();
	$wpApiController->getPointsDistributionSlideContent();
});

$router->get('/searchTeachers', function () {
	$teacherApiController = new TeacherApiController();
	$teacherApiController->searchTeachers();
});

$router->get('/getFaculties', function () {
	$facultyApiController = new FacultyApiController();
	$facultyApiController->getFaculties();
});

$router->post('/duplicateWP', function () {
	$wpApiController = new WPApiController();
	$wpApiController->duplicateWP();
});

$router->post('/updateGlobalData', function () {
	$workingProgramGlobalDataOverwriteApiController = new WorkingProgramGlobalDataOverwriteApiController();
	$workingProgramGlobalDataOverwriteApiController->updateGlobalData();
});

$router->post('/updateWorkingProgramGlobalDataOverwrite', function () {
	$workingProgramGlobalDataOverwriteApiController = new WorkingProgramGlobalDataOverwriteApiController();
	$workingProgramGlobalDataOverwriteApiController->updateWorkingProgramGlobalDataOverwrite();
});

$router->post('/createNewWP', function () {
	$wpApiController = new WPApiController();
	$wpApiController->createNewWP();
});

$router->post('/updateWPDetails', function () {
	$wpApiController = new WPApiController();
	$wpApiController->updateWPDetails();
});

$router->post('/updateWPInvolvedPerson', function () {
	$involvedPersonApiController = new WPInvolvedPersonApiController();
	$involvedPersonApiController->updateWorkingProgramInvolvedPerson();
});

$router->post('/updateWPInvolvedPersonDetails', function () {
	$involvedPersonApiController = new WPInvolvedPersonApiController();
	$involvedPersonApiController->updateWorkingProgramInvolvedPersonDetails();
});

$router->post('/createNewSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->createNewSemester();
});

$router->post('/updateSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->updateSemester();
});

$router->post('/updateCourseworkAssesmentComponents', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->updateCourseworkAssesmentComponents();
});

$router->post('/createNewModule', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->createNewModule();
});

$router->post('/updateModule', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->updateModule();
});

$router->post('/createNewTheme', function () {
	$moduleApiController = new ThemeApiController();
	$moduleApiController->createNewTheme();
});

$router->post('/updateTheme', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->updateTheme();
});

$router->post('/createNewLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->createNewLesson();
});

$router->post('/updateLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->updateLesson();
});

$router->post('/updateHours', function () {
	$educationalFormLessonHoursApiController = new EducationalFormLessonHoursApiController();
	$educationalFormLessonHoursApiController->updateEducationalFormLessonHours();
});

$router->post('/updateCourseworkHours', function () {
	$educationalFormCourseworkHoursApiController = new EducationalFormCourseworkHoursApiController();
	$educationalFormCourseworkHoursApiController->updateEducationalFormCourseworkHours();
});

$router->post('/createSemesterEducationForm', function () {
	$semesterEducationFormApiController = new SemesterEducationFormApiController();
	$semesterEducationFormApiController->createSemesterEducationForm();
});

$router->post('/updateWPLiterature', function () {
	$workingProgramLiteratureApiController = new WorkingProgramLiteratureApiController();
	$workingProgramLiteratureApiController->updateWPLiterature();
});

$router->delete('/deleteTheme', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->deleteTheme();
});

$router->delete('/deleteModule', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->deleteModule();
});

$router->delete('/deleteSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->deleteSemester();
});

$router->delete('/deleteSemesterEducationForm', function () {
	$semesterEducationFormApiController = new SemesterEducationFormApiController();
	$semesterEducationFormApiController->deleteSemesterEducationForm();
});

$router->delete('/deleteCoursework', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->deleteCoursework();
});

$router->delete('/deleteColloquium', function () {
	$moduleApiController = new ModuleApiController();
	$moduleApiController->deleteColloquium();
});

$router->delete('/deleteLesson', function () {
	$lessonApiController = new LessonApiController();
	$lessonApiController->deleteLesson();
});

$router->run();
