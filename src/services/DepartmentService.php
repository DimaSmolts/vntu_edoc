<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class DepartmentService
{
	public function getDepartmentsByQuery($query)
	{
		$departments = Capsule::table('departments')
			->select('id', 'd_name')
			->where('d_type', 3)
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
