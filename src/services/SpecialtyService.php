<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SpecialtyService
{
	public function getSpecialtiesByQuery($queryText)
	{
		$specialties = Capsule::table('special')
			->selectRaw("
        		MIN(id) AS id,
				CASE 
					WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
					ELSE spec
				END AS name,
				spec_num_code
			")
			->where(function ($query) use ($queryText) {
				$query->where('spec', 'LIKE', "%$queryText%")
					->orWhere('spec_num_code', '=', $queryText);
			})
			->where('arc', '=', false)
			->groupBy('name', 'spec_num_code')
			->get();

		return $specialties;
	}

	public function getSpecialtiesById($id)
	{
		$specialties = Capsule::table('special')
			->selectRaw("
				MIN(id) AS id,
				CASE 
					WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
					ELSE spec
				END AS name,
				spec_num_code
			")
			->where('id', $id)
			->groupBy('name', 'spec_num_code')
			->get();

		return $specialties;
	}
}
