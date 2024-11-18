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

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpInvolvedPersonId = intval($data['wpInvolvedPersonId']) ?? NULL;
		$wpId = intval($data['wpId']);
		$personId = intval($data['personId']);
		$involvedPersonRoleId = intval($data['roleId']);

		$this->personService->updateWorkingProgramInvolvedPerson($wpInvolvedPersonId, $wpId, $personId, $involvedPersonRoleId);
	}
}
