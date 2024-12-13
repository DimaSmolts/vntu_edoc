<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBDepartmentModel.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\DBDepartmentModel;

class DepartmentService
{
	public function getDepartments($facultyId)
	{
		return DBDepartmentModel::select(['id', 'd_name'])
			->where('d_prev', $facultyId)
			->get();
	}

	public function getDepartmentsByQuery($query)
	{
		$departments = Capsule::table('departments')
			->select('id', 'd_name')
			->where('d_name', 'LIKE', '%' . $query . '%')
			->limit(10)
			->get();

		return $departments;
	}

	public function getDepartmentsById($id)
	{
		$departments = Capsule::table('departments')
			->select('id', 'd_name')
			->where('id', $id)
			->get();

		return $departments;
	}
}
