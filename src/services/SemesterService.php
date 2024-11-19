<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SemesterService
{
	public function createNewSemester($wpId): int
	{
		$semesterId = Capsule::table('educationalDisciplineSemester')->insertGetId([
			'educationalDisciplineWPId' => $wpId
		]);

		return $semesterId;
	}

	public function updateSemester($id, $field, $value)
	{
		$semester = Capsule::table('educationalDisciplineSemester')->where('id', $id)->first();

		if (!$semester) {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineSemester')
			->where('id', $id)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Semester updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function deleteSemester($id)
	{
		$deleted = Capsule::table('educationalDisciplineSemester')->where('id', $id)->delete();

		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Semester deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found or delete failed']);
		}
	}
}
