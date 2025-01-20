<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalProgramService
{
	public function getEducationalProgramsByQuery($queryText)
	{
		$educationalPrograms = Capsule::table('special')
			->selectRaw("
				MIN(id) AS id,
				TRIM(
					CASE 
						WHEN INSTR(spec, '.') > 0 
						THEN SUBSTR(spec, INSTR(spec, '.') + 1)
						ELSE ''
					END
				) AS name
			")
			->whereRaw("INSTR(spec, '.') > 0")
			->whereRaw("SUBSTR(spec, INSTR(spec, '.') + 1) LIKE ?", ["%$queryText%"])
			->where('arc', '=', false)
			->groupBy('name')
			->having('name', '<>', '')
			->get();


		return $educationalPrograms;
	}

	public function getEducationalProgramsByIds($ids)
	{
		$educationalPrograms = Capsule::table('special')
			->selectRaw("
				MIN(id) AS id,
				TRIM(
					CASE 
						WHEN INSTR(spec, '.') > 0 
						THEN SUBSTR(spec, INSTR(spec, '.') + 1)
						ELSE ''
					END
				) AS name
			")
			->whereIn('id', $ids)
			->groupBy('name')
			->get();

		return $educationalPrograms;
	}
}
