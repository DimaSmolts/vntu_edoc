<?php

namespace App\Models;

class PointsDistributionRelatedDataModel
{
	public int $wpId;
	public ?string $pointsDistribution;
	public array $semesters;

	public function __construct(
		int $wpId,
		?string $pointsDistribution = "",
		array $semesters = [],
	) {
		$this->wpId = $wpId;
		$this->pointsDistribution = $pointsDistribution;
		$this->semesters = $semesters;
	}
}
