<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalFormModel.php';

use App\Models\DBEducationalFormModel;

class EducationalFormService
{
	public function getEducationalForms()
	{
		$types = DBEducationalFormModel::select(['id', 'name'])
			->get();

		return $types;
	}
}
