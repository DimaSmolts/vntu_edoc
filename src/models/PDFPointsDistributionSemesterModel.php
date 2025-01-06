<?php

namespace App\Models;

require_once __DIR__ . '/PDFPointsDistributionModulesTotalModel.php';
require_once __DIR__ . '/TaskModel.php';

use App\Models\PDFPointsDistributionModulesTotalModel;
use App\Models\TaskModel;

class PDFPointsDistributionSemesterModel
{
	public int $id;
	public int $semesterTotal;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public array $modules;
	public ?PDFPointsDistributionModulesTotalModel $modulesTotal;
	public ?string $pointsDistribution;
	public ?int $calculationAndGraphicWorkPoints;
	public ?int $calculationAndGraphicTaskPoints;

	public function __construct(
		int $id,
		int $semesterTotal,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		array $modules = [],
		?PDFPointsDistributionModulesTotalModel $modulesTotal = null,
		?string $pointsDistribution = '',
		?int $calculationAndGraphicWorkPoints = null,
		?int $calculationAndGraphicTaskPoints = null,
	) {
		$this->id = $id;
		$this->semesterTotal = $semesterTotal;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->modules = $modules;
		$this->modulesTotal = $modulesTotal;
		$this->pointsDistribution = $pointsDistribution;
		$this->calculationAndGraphicWorkPoints = $calculationAndGraphicWorkPoints;
		$this->calculationAndGraphicTaskPoints = $calculationAndGraphicTaskPoints;
	}
}
