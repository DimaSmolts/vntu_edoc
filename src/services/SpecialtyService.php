<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SpecialtyService
{
	public function getSpecialtiesByQuery($query)
	{
		$specialties = Capsule::table('special')
			->select('id', 'spec', 'spec_num_code', 'arc')
			->where('arc', false)
			->where(function ($q) use ($query) {
				$q->where('spec', 'LIKE', '%' . $query . '%')
					->orWhere('spec_num_code', 'LIKE', '%' . $query . '%');
			})
			->limit(10)
			->get();

		return $specialties;
	}

	public function getSpecialtiesByIds($ids)
	{
		$specialties = Capsule::table('special')
			->select('id', 'spec', 'spec_num_code', 'arc')
			->whereIn('id', $ids)
			->get();

		return $specialties;
	}
}
