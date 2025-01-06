<?php

namespace App\Models;

class PDFPointsDistributionModuleModel
{
	public int $moduleId;
	public int $practicalsPoints;
	public int $labsPoints;
	public int $seminarsPoints;
	public bool $isColloquiumExists;
	public int $colloquiumPoints;
	public bool $isControlWorkExists;
	public int $controlWorkPoints;
	public int $moduleTotal;
	public ?int $moduleNumber;

	public function __construct(
		int $moduleId,
		int $practicalsPoints = null,
		int $labsPoints = null,
		int $seminarsPoints = null,
		bool $isColloquiumExists = false,
		int $colloquiumPoints = null,
		bool $isControlWorkExists = false,
		int $controlWorkPoints = null,
		int $moduleTotal = null,
		?int $moduleNumber = null,
	) {
		$this->moduleId = $moduleId;
		$this->practicalsPoints = $practicalsPoints;
		$this->labsPoints = $labsPoints;
		$this->seminarsPoints = $seminarsPoints;
		$this->isColloquiumExists = $isColloquiumExists;
		$this->colloquiumPoints = $colloquiumPoints;
		$this->isControlWorkExists = $isControlWorkExists;
		$this->controlWorkPoints = $controlWorkPoints;
		$this->moduleTotal = $moduleTotal;
		$this->moduleNumber = $moduleNumber;
	}
}
