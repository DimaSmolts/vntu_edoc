<?php

namespace App\Models;

class PointsDistributionRelatedModuleWithLessonsModel
{
	public int $moduleId;
	public int $practicals;
	public int $seminars;
	public int $labs;
	public bool $isColloquiumExists;
	public bool $isControlWorkExists;
	public ?int $moduleNumber;
	public ?int $colloquiumPoints;

	public function __construct(
		int $moduleId,
		int $practicals,
		int $seminars,
		int $labs,
		bool $isColloquiumExists,
		bool $isControlWorkExists,
		?int $moduleNumber = null,
		?int $colloquiumPoints = null
	) {
		$this->moduleId = $moduleId;
		$this->practicals = $practicals;
		$this->seminars = $seminars;
		$this->labs = $labs;
		$this->isColloquiumExists = $isColloquiumExists;
		$this->isControlWorkExists = $isControlWorkExists;
		$this->moduleNumber = $moduleNumber;
		$this->colloquiumPoints = $colloquiumPoints;
	}
}
