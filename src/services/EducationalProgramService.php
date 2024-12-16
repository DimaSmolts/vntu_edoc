<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalProgramService
{
	public function getEducationalProgramsByQuery($query)
	{
		$educationalPrograms = Capsule::table('special')
			->select('id', 'spec', 'arc')
			->where('arc', false)
			->where('spec', 'LIKE', '%' . $query . '%')
			->limit(10)
			->get();

		return $educationalPrograms;
	}

	public function getEducationalProgramsByIds($ids)
	{
		$educationalPrograms = Capsule::table('special')
			->select('id', 'spec', 'arc')
			->whereIn('id', $ids)
			->get();

		return $educationalPrograms;
	}
}
