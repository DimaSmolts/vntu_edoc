<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class SemesterEducationFormService
{
	public function createSemesterEducationForm($educationalDisciplineSemesterId, $educationalFormId): int
	{
		$educationalDisciplineSemesterEducationFormId = Capsule::table('educationalDisciplineSemesterEducationForm')->insertGetId([
			'educationalDisciplineSemesterId' => $educationalDisciplineSemesterId,
			'educationalFormId' => $educationalFormId
		]);

		return $educationalDisciplineSemesterEducationFormId;
	}

	public function deleteSemesterEducationForm($educationalDisciplineSemesterId, $educationalFormId)
	{
		$deleted = Capsule::table('educationalDisciplineSemesterEducationForm')
			->where('educationalDisciplineSemesterId', $educationalDisciplineSemesterId)
			->where('educationalFormId', $educationalFormId)
			->delete();

		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'SemesterEducationForm deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'SemesterEducationForm not found or delete failed']);
		}
	}
}
