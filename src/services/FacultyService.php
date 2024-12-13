<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class FacultyService
{
	public function getFaculties()
	{
		return  Capsule::table('departments')
			->where('d_type', 2)
			->whereNotLike('f_code', '')
			->get();
	}
}
