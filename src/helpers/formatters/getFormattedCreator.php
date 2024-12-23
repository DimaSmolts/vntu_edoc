<?php

require_once __DIR__ . '/../../models/PersonModel.php';

use App\Models\PersonModel;

function getFormattedCreator($creatorData)
{
	list($surname, $name, $patronymicName) = explode(" ", $creatorData->t_name);

	return new PersonModel(
		$creatorData->id,
		$surname,
		$name,
		$patronymicName
	);
}
