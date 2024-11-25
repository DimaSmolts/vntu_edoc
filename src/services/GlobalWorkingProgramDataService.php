<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class GlobalWorkingProgramDataService
{
	public function getGlobalWPData()
	{
		return Capsule::table('globalWorkingProgramsData')
			->get();
	}

	public function updateGlobalWPData($fieldName, $value)
	{
		$data = Capsule::table('globalWorkingProgramsData')->where('name', $fieldName)->first();

		if (!$data) {
			echo json_encode(['status' => 'error', 'message' => 'Global data not found']);
			return;
		}

		$updated = Capsule::table('globalWorkingProgramsData')
			->where('name', $fieldName)
			->update(['value' => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Global data updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
