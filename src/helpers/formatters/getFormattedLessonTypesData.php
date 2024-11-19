<?php

require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';

use App\Models\LessonTypeModel;

function getFormattedLessonTypesData($lessonTypes)
{
	return $lessonTypes->map(function ($lessonType) {
		return new LessonTypeModel(
			$lessonType->id,
			$lessonType->name,
		);
	})->toArray();
}
