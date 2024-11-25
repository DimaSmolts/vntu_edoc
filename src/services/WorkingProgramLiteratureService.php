<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class WorkingProgramLiteratureService
{
	public function createNewWPLiterature($wpId)
	{
		return Capsule::table('workingProgramLiterature')->insertGetId([
			'educationalDisciplineWorkingProgramId' => $wpId
		]);
	}

	public function updateWPLiterature($wpId, $field, $value)
	{
		$literature = Capsule::table('workingProgramLiterature')->where('educationalDisciplineWorkingProgramId', $wpId)->first();

		if (!$literature) {
			echo json_encode(['status' => 'error', 'message' => 'Global data not found']);
			return;
		}

		$updated = Capsule::table('workingProgramLiterature')
			->where('educationalDisciplineWorkingProgramId', $wpId)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Literature data updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
