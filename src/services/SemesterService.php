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

	public function deleteSemester($id)
	{
		$deleted = Capsule::table('educationalDisciplineSemester')->where('id', $id)->delete();

		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Semester deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found or delete failed']);
		}
	}

	public function getCourseworksAndProjectsByWPId($wpId)
	{
		$coursework = DBEducationalDisciplineSemesterModel::with([
			'educationalForms.educationalForm'
		])
			->where('educationalDisciplineWPId', $wpId)
			->get();

		return $coursework;
	}

	public function updateCourseworkAssesmentComponents($id, $courseworkAssessmentComponents)
	{
		$semester = Capsule::table('educationalDisciplineSemester')->where('id', $id)->first();

		if (!$semester) {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineSemester')
			->where('id', $id)
			->update(['courseworkAssessmentComponents' => $courseworkAssessmentComponents]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Assesment components updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function updateCourseProjectAssesmentComponents($id, $courseProjectAssessmentComponents)
	{
		$semester = Capsule::table('educationalDisciplineSemester')->where('id', $id)->first();

		if (!$semester) {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineSemester')
			->where('id', $id)
			->update(['courseProjectAssessmentComponents' => $courseProjectAssessmentComponents]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Assesment components updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function deleteCoursework($semesterId)
	{
		$deletedCoursework = Capsule::table('educationalDisciplineSemester')
			->where('id', $semesterId)
			->update([
				'isCourseworkExists' => false,
				'courseworkAssessmentComponents' => null
			]);

		if ($deletedCoursework) {
			echo json_encode(['status' => 'success', 'message' => 'Coursework deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Coursework not found or delete failed']);
		}
	}

	public function updateAdditionalTasks($id, $additionalTasksComponents)
	{
		$semester = Capsule::table('educationalDisciplineSemester')->where('id', $id)->first();

		if (!$semester) {
			echo json_encode(['status' => 'error', 'message' => 'Semester not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineSemester')
			->where('id', $id)
			->update(['additionalTasks' => $additionalTasksComponents]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Additional tasks updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function deleteCourseProject($semesterId)
	{
		$deletedCoursework = Capsule::table('educationalDisciplineSemester')
			->where('id', $semesterId)
			->update([
				'isCourseProjectExists' => false,
				'courseProjectAssessmentComponents' => null
			]);

		if ($deletedCoursework) {
			echo json_encode(['status' => 'success', 'message' => 'Coursework deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Coursework not found or delete failed']);
		}
	}
}
