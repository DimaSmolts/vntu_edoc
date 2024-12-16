<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SpecialtyService
{
	public function getSpecialtiesByQuery($query)
	{
		$specialties = Capsule::table('spec_edu_pr')
			->select('id', 'spec', 'spec_num_code')
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
		$specialties = Capsule::table('spec_edu_pr')
			->select('id', 'spec', 'spec_num_code')
			->whereIn('id', $ids)
			->get();

		return $specialties;
	}
}
