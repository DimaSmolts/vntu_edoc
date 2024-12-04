<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBDepartmentModel.php';

use App\Models\DBDepartmentModel;

class DepartmentService
{
	public function getDepartments($facultyId)
	{
		return DBDepartmentModel::select(['id', 'd_name'])
			->where('d_prev', $facultyId)
			->get();
	}
}
