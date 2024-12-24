<?php

namespace App\Models;

require_once __DIR__ . '/PDFPointsDistributionModulesTotalModel.php';

use App\Models\PDFPointsDistributionModulesTotalModel;

class PDFPointsDistributionSemesterModel
{
	public int $id;
	public int $semesterTotal;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public array $modules;
	public ?PDFPointsDistributionModulesTotalModel $modulesTotal;

	public function __construct(
		int $id,
		int $semesterTotal,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		array $modules = [],
		?PDFPointsDistributionModulesTotalModel $modulesTotal = null,
	) {
		$this->id = $id;
		$this->semesterTotal = $semesterTotal;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->modules = $modules;
		$this->modulesTotal = $modulesTotal;
	}
}
