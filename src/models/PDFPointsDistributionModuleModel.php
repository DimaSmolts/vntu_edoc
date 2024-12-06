<?php

namespace App\Models;

class PDFPointsDistributionModuleModel
{
	public int $moduleId;
	public int $practicalsPoints;
	public int $labsPoints;
	public int $seminarsPoints;
	public int $colloquiumPoints;
	public int $moduleTotal;
	public ?int $moduleNumber;

	public function __construct(
		int $moduleId,
		int $practicalsPoints = null,
		int $labsPoints = null,
		int $seminarsPoints = null,
		int $colloquiumPoints = null,
		int $moduleTotal = null,
		?int $moduleNumber = null,
	) {
		$this->moduleId = $moduleId;
		$this->practicalsPoints = $practicalsPoints;
		$this->labsPoints = $labsPoints;
		$this->seminarsPoints = $seminarsPoints;
		$this->colloquiumPoints = $colloquiumPoints;
		$this->moduleTotal = $moduleTotal;
		$this->moduleNumber = $moduleNumber;
	}
}
