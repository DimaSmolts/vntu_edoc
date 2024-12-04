<?php

namespace App\Models;

class PointsDistributionRelatedModuleWithLessonsModel
{
	public int $moduleId;
	public int $practicals;
	public int $seminars;
	public int $labs;
	public bool $isColloquiumExists;
	public ?int $moduleNumber;
	public ?int $colloquiumPoints;

	public function __construct(
		int $moduleId,
		int $practicals,
		int $seminars,
		int $labs,
		bool $isColloquiumExists,
		?int $moduleNumber = null,
		?int $colloquiumPoints = null
	) {
		$this->moduleId = $moduleId;
		$this->practicals = $practicals;
		$this->seminars = $seminars;
		$this->labs = $labs;
		$this->isColloquiumExists = $isColloquiumExists;
		$this->moduleNumber = $moduleNumber;
		$this->colloquiumPoints = $colloquiumPoints;
	}
}
