<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class StydingLevelTypeApiService
{
	public function getStydingLevelTypes()
	{
		return Capsule::table('dec_curr_level')
			->get();
	}
}
