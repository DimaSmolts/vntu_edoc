<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class FieldOfStudyService
{
	public function createNewFieldOfStudy($fieldOfStudyName)
	{
		// Створюємо тип для цього завдання
		$fieldOfStudyId = Capsule::table('fieldsOfStudy')->insertGetId([
			'name' => $fieldOfStudyName
		]);

		return $fieldOfStudyId;
	}

	public function getFieldsOfStudy()
	{
		$fieldsOfStudy = Capsule::table('fieldsOfStudy')
			->get();

		return $fieldsOfStudy;
	}
}
