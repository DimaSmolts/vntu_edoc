<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SubjectTypeService
{
	public function getSubjectTypes()
	{
		return Capsule::table('dec_subj_type')
			->get();
	}
}
