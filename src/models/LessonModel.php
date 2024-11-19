<?php

namespace App\Models;

class LessonModel
{
	public int $id;
	public int $themeId;
	public string $lessonTypeId;
	public string $name;
	public int $educationalFormLessonHoursId;
	public int $educationalFormId;
	public int $lessonThemeId;
	public int $hours;

	public function __construct(
		$id,
		$themeId,
		$lessonTypeId,
		$name,
		$educationalFormLessonHoursId,
		$educationalFormId,
		$lessonThemeId,
		$hours
	) {
		$this->id = $id;
		$this->themeId = $themeId;
		$this->lessonTypeId = $lessonTypeId;
		$this->name = $name;
		$this->educationalFormLessonHoursId = $educationalFormLessonHoursId;
		$this->educationalFormId = $educationalFormId;
		$this->lessonThemeId = $lessonThemeId;
		$this->hours = $hours;
	}
}

// SELECT `lessonThemes`.*, `educationFormLessonHours`.`id` as `educationalFormLessonHoursId`, `educationFormLessonHours`.`educationalFormId`, `educationFormLessonHours`.`lessonThemeId`, `educationFormLessonHours`.`hours` FROM `lessonThemes`
// INNER JOIN `educationFormLessonHours` ON `educationFormLessonHours`.`lessonThemeId`=  `lessonThemes`.`id`
// WHERE `educationFormLessonHours`.`educationalFormId` = 1