<?php

namespace App\Models;

class PDFPointsDistributionModulesTotalModel
{
	public int $practicalsPoints;
	public int $labsPoints;
	public int $seminarsPoints;
	public int $colloquiumPoints;
	public int $modulesTotalPoints;

	public function __construct(
		int $practicalsPoints = null,
		int $labsPoints = null,
		int $seminarsPoints = null,
		int $colloquiumPoints = null,
		int $modulesTotalPoints = null,
	) {
		$this->practicalsPoints = $practicalsPoints;
		$this->labsPoints = $labsPoints;
		$this->seminarsPoints = $seminarsPoints;
		$this->colloquiumPoints = $colloquiumPoints;
		$this->modulesTotalPoints = $modulesTotalPoints;
	}
}
