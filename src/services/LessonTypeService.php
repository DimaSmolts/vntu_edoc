<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBLessonTypeModel.php';

use App\Models\DBLessonTypeModel;

class LessonTypeService
{
	public function getLessonTypes(): array
	{
		$types = DBLessonTypeModel::select(['id', 'name'])
			->get();

		return $types;
	}
}
