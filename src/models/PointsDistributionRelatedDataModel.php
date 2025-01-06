<?php

namespace App\Models;

class PointsDistributionRelatedDataModel
{
	public int $wpId;
	public array $semesters;

	public function __construct(
		int $wpId,
		array $semesters = [],
	) {
		$this->wpId = $wpId;
		$this->semesters = $semesters;
	}
}
