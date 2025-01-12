<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SpecialtyService
{
	public function getSpecialtiesByQuery($query)
	{
		$specialties = Capsule::table('special')
			->selectRaw("
				DISTINCT CASE 
					WHEN INSTR(name, '.') > 0 THEN SUBSTR(name, 1, INSTR(name, '.') - 1)
					ELSE name
				END || '.' AS specialtyName,
				spec_num_code
			")
			->where(function ($q) use ($query) {
				$q->where('name', 'LIKE', "$query%")
					->orWhere('spec_num_code', 'LIKE', '%' . $query . '%');
			})
			->limit(10)
			->get();

		return $specialties;
	}

	public function getSpecialtiesByIds($ids)
	{
		$specialties = Capsule::table('spec_edu_pr')
			->select('id', 'spec', 'spec_num_code')
			->whereIn('id', $ids)
			->get();

		return $specialties;
	}
}
