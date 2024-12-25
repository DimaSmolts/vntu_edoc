<?php

namespace App\Models;

class LessonsAndExamingsStructureModel
{
	public bool $isPracticalsExist;
	public bool $isLabsExist;
	public bool $isSeminarsExist;
	public bool $isCourseworkExists;
	public bool $isCourseProjectExists;
	public bool $isCalculationAndGraphicWorkExists;
	public bool $isCalculationAndGraphicTaskExists;
	public bool $isAdditionalTasksExist;
	public bool $isColloquiumExists;
	public bool $isControlWorkExists;

	public function __construct(
		bool $isPracticalsExist,
		bool $isLabsExist,
		bool $isSeminarsExist,
		bool $isCourseworkExists,
		bool $isCourseProjectExists,
		bool $isCalculationAndGraphicWorkExists,
		bool $isCalculationAndGraphicTaskExists,
		bool $isAdditionalTasksExist,
		bool $isColloquiumExists,
		bool $isControlWorkExists,
	) {
		$this->isPracticalsExist = $isPracticalsExist;
		$this->isLabsExist = $isLabsExist;
		$this->isSeminarsExist = $isSeminarsExist;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->isCourseProjectExists = $isCourseProjectExists;
		$this->isCalculationAndGraphicWorkExists = $isCalculationAndGraphicWorkExists;
		$this->isCalculationAndGraphicTaskExists = $isCalculationAndGraphicTaskExists;
		$this->isAdditionalTasksExist = $isAdditionalTasksExist;
		$this->isColloquiumExists = $isColloquiumExists;
		$this->isControlWorkExists = $isControlWorkExists;
	}
}
