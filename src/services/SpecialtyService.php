<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SpecialtyService
{
	public function getSpecialtiesByQuery($queryText)
	{
		$specialties = Capsule::table('special')
			->selectRaw("
            id,
            spec_num_code,
				CASE 
					WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1) 
					ELSE spec 
				END AS name
			")
			->where(function ($query) use ($queryText) {
				$query->where('spec', 'LIKE', "%$queryText%")
					->orWhere('spec_num_code', '=', $queryText);
			})
			->where('arc', '=', false)
			->orderByRaw("
				CASE 
					WHEN INSTR(
						CASE 
							WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1) 
							ELSE spec 
						END, '`'
					) > 0 THEN 1 
					ELSE 2 
				END
			")  // Prioritize backticks only in the first sentence
			->orderBy('id') // Ensures consistent selection of first occurrence
			->get()
			->groupBy('spec_num_code')
			->map(function ($groupedItems) {
				return $groupedItems->first(); // Select the first available correct row per spec_num_code
			})
			->values(); // Reset array keys

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
