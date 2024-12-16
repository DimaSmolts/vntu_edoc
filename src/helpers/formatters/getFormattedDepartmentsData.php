<?php

require_once __DIR__ . '/../../models/DepartmentModel.php';

use App\Models\DepartmentModel;

function getFormattedDepartmentsData($departments)
{
	return $departments->map(function ($department) {
		return new DepartmentModel(
			$department->id,
			$department->d_name
		);
	})->toArray();
}
