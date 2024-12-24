<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class ExamTypeService
{
	public function getExamTypes()
	{
		return Capsule::table('dec_exam_types')
			->whereIn('id', [0, 1, 2])
			->get();
	}
}
