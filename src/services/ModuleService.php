<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class ModuleService
{
	public function createNewModule($semesterId): int
	{
		$moduleId = Capsule::table('modules')->insertGetId([
			'educationalDisciplineSemesterId' => $semesterId
		]);

		return $moduleId;
	}

	public function updateModule($id, $field, $value)
	{
		$module = Capsule::table('modules')->where('id', $id)->first();

		if (!$module) {
			echo json_encode(['status' => 'error', 'message' => 'Module not found']);
			return;
		}

		$updated = Capsule::table('modules')
			->where('id', $id)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Module updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function deleteModule($id)
	{
		$deleted = Capsule::table('modules')->where('id', $id)->delete();

		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Module deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Module not found or delete failed']);
		}
	}
}
