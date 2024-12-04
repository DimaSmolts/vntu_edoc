<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBFacultyModel.php';

use App\Models\DBFacultyModel;

class FacultyService
{
	public function getFaculties()
	{
		return DBFacultyModel::select(['id', 'd_name'])
			->where('d_type', 2)
			->whereNotLike('f_code', '')
			->get();
	}
}
