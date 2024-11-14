<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/controllers/WPController.php';
require_once __DIR__ . '/src/controllers/PDFController.php';
require_once __DIR__ . '/src/controllers/api/WPApiController.php';
require_once __DIR__ . '/src/controllers/api/PersonApiController.php';
require_once __DIR__ . '/src/controllers/api/SemesterApiController.php';
require_once __DIR__ . '/src/controllers/api/ModuleApiController.php';
require_once __DIR__ . '/src/controllers/api/ThemeApiController.php';

use Dotenv\Dotenv;
use Bramus\Router\Router;
use App\Controllers\WPController;
use App\Controllers\WPApiController;
use App\Controllers\PersonApiController;
use App\Controllers\SemesterApiController;
use App\Controllers\ModuleApiController;
use App\Controllers\ThemeApiController;
use App\Controllers\PDFController;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

$router->get('/wplist', function () {
	$wpController = new WPController();
	$wpController->getWPListItems();
});

$router->get('/wpdetails', function () {
	$wpController = new WPController();
	$wpController->getWPDetails();
});

$router->get('/pdf', function () {
	$pdfController = new PDFController();
	$pdfController->getPDFData();
});

$router->get('/getThemes', function () {
	$themeApiController = new ThemeApiController();
	$themeApiController->getThemesByWPId();
});

$router->post('/saveNewWP', function () {
	$wpApiController = new WPApiController();
	$wpApiController->createNewWP();
});

$router->post('/updateWPDetails', function () {
	$wpApiController = new WPApiController();
	$wpApiController->updateWPDetails();
});

$router->post('/updateWPInvolvedPerson', function () {
	$personApiController = new PersonApiController();
	$personApiController->updateWorkingProgramInvolvedPerson();
});

$router->post('/createNewSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->createNewSemester();
});

$router->post('/updateSemester', function () {
	$semesterApiController = new SemesterApiController();
	$semesterApiController->updateSemester();
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
$router->run();
