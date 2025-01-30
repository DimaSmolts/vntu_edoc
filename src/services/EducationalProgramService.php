<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalProgramService
{
	public function getEducationalProgramsByQuery($queryText, $specialtyId)
	{
		$specNum = Capsule::table('special')
			->where('id', $specialtyId)
			->get()
			->first()
			->spec_num_code;

		$educationalPrograms = Capsule::table('special')
			->selectRaw("
				id,
				TRIM(
					CASE 
						WHEN INSTR(spec, '.') > 0 
						THEN SUBSTR(spec, INSTR(spec, '.') + 1)
						ELSE ''
					END
				) AS name
			")
			->whereRaw("INSTR(spec, '.') > 0") // Ensure only rows with a second sentence
			->where(function ($query) use ($queryText) {
				// Handle apostrophe variations for search
				$query->whereRaw("SUBSTR(spec, INSTR(spec, '.') + 1) LIKE ?", ["%$queryText%"])
					->orWhereRaw("REPLACE(REPLACE(REPLACE(SUBSTR(spec, INSTR(spec, '.') + 1), '’', ''''), '`', ''''), '''', '’') LIKE ?", ["%$queryText%"]);
			})
			->where('arc', '=', false)
			->where('spec_num_code', $specNum)
			->get()
			->groupBy(function ($row) {
				// Normalize names by replacing apostrophe variations
				return str_replace(['’', "'", '`'], '', $row->name);
			})
			->map(function ($group) {
				// Prioritize versions with backticks (`) if available
				return collect($group)->sortBy(function ($row) {
					return strpos($row->name, '`') === false ? 2 : 1;
				})->first();
			})
			->values(); // Reset array keys

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
