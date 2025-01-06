<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalDisciplineSemesterModel.php';

use App\Models\DBEducationalDisciplineSemesterModel;

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

	public function updateCourseworkAndProjectTasks($id, $fieldToSet, $valueToSet, $fieldToFalse, $fieldToNull)
	{
		$semester = Capsule::table('educationalDisciplineSemester')->where('id', $id)->first();

		if (!$semester) {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineSemester')
			->where('id', $id)
			->update([
				$fieldToSet => $valueToSet,
				$fieldToFalse => false,
				$fieldToNull => null
			]);

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

	public function getCourseworksAndProjectsByWPId($wpId, $courseworksAndProjectsIds)
	{
		$coursework = DBEducationalDisciplineSemesterModel::select(['id', 'semesterNumber'])
			->with([
				'educationalForms.educationalForm',
				'tasks' => function ($query) use (&$courseworksAndProjectsIds) {
					$query
						->with([
							'taskType',
							'educationalFormTaskHours',
						])
						->whereIn('taskTypeId', $courseworksAndProjectsIds);
				}
			])
			->where('educationalDisciplineWPId', $wpId)
			->get();

		return $coursework;
	}

}
