<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/PersonService.php';

use App\Services\PersonService;

class PersonApiController
{
	protected PersonService $personService;

	function __construct()
	{
		$this->personService = new PersonService();
	}

	public function updateWorkingProgramInvolvedPerson()
	{
		header('Content-Type: application/json');

		$this->personService->updateWorkingProgramInvolvedPerson();
	}
}
