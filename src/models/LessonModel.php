<?php

namespace App\Models;

class LessonModel
{
	public int $lessonId;
	public int $lessonTypeId;
	public ?string $lessonName;
	public ?int $lessonNumber;
	public array $educationalFormHours;

	public function __construct(
		int $lessonId,
		int $lessonTypeId,
		?string $lessonName = "",
		?int $lessonNumber = null,
		array $educationalFormHours = []
	) {
		$this->lessonId = $lessonId;
		$this->lessonTypeId = $lessonTypeId;
		$this->lessonName = $lessonName;
		$this->lessonNumber = $lessonNumber;
		$this->educationalFormHours = $educationalFormHours;
	}
}
