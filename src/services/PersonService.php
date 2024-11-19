<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBPersonModel.php';

use App\Models\DBPersonModel;

class PersonService
{
	public function getPersons()
	{
		$persons = DBPersonModel::select(['id', 'surname', 'name',  'patronymicName', 'degree'])
			->get();

		return $persons;
	}
}
