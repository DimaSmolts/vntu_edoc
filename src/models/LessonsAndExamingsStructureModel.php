<?php

namespace App\Models;

class LessonsAndExamingsStructureModel
{
	public bool $isPracticalsExist;
	public bool $isLabsExist;
	public bool $isSeminarsExist;
	public bool $isCourseworkExists;
	public bool $isColloquiumExists;

	public function __construct(
		bool $isPracticalsExist,
		bool $isLabsExist,
		bool $isSeminarsExist,
		bool $isCourseworkExists,
		bool $isColloquiumExists,
	) {
		$this->isPracticalsExist = $isPracticalsExist;
		$this->isLabsExist = $isLabsExist;
		$this->isSeminarsExist = $isSeminarsExist;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->isColloquiumExists = $isColloquiumExists;
	}
}
