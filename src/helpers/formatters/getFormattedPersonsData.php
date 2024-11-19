<?php

require_once __DIR__ . '/../../models/PersonModel.php';

use App\Models\PersonModel;

function getFormattedPersonsData($persons)
{
	return $persons->map(function ($person) {
		return new PersonModel(
			$person->id,
			$person->surname,
			$person->name,
			$person->patronymicName,
			$person->degree,
		);
	});
}
