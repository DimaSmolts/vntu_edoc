<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class LessonService
{
	public function getLessonById($id)
	{
		return Capsule::table('lessons')
			->where([
				'id' => $id
			])
			->get()
			->first();
	}

	public function getLessonsByModulesIdsAndTypeId($lessonTypeId, $modulesIds)
	{
		return Capsule::table('lessons')
			->where('lessonTypeId', $lessonTypeId)
			->whereIn('moduleId', $modulesIds)
			->get();
	}

	public function createNewLesson($moduleId, $lessonTypeId): int
	{
		$lessonId = Capsule::table('lessons')->insertGetId([
			'moduleId' => $moduleId,
			'lessonTypeId' => $lessonTypeId
		]);

		return $lessonId;
	}

	public function updateLesson($themeId, $lessonTypeId, $field, $value)
	{
		$lesson = Capsule::table('lessons')
			->where('themeId', $themeId)
			->where('lessonTypeId', $lessonTypeId)
			->first();

		if (!$lesson) {
			echo json_encode(['status' => 'error', 'message' => 'Lesson theme not found']);
			return;
		}

		$updated = Capsule::table('lessons')
			->where('themeId', $themeId)
			->where('lessonTypeId', $lessonTypeId)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Lesson theme updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function updateLessonById($id, $field, $value)
	{
		$lesson = Capsule::table('lessons')
			->where('id', $id)
			->first();

		if (!$lesson) {
			echo json_encode(['status' => 'error', 'message' => 'Lesson theme not found']);
			return;
		}

		$updated = Capsule::table('lessons')
			->where('id', $id)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Lesson theme updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function deleteLesson($id)
	{
		// Use Capsule to delete the theme by ID
		$deleted = Capsule::table('lessons')->where('id', $id)->delete();

		// Check if any row was deleted
		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Lesson deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Lesson not found or delete failed']);
		}
	}

	public function deleteAllLessonsByType($lessonTypeId, $modulesIds)
	{
		// Use Capsule to delete the theme by ID
		$deleted = Capsule::table('lessons')
			->where('lessonTypeId', $lessonTypeId)
			->whereIn('moduleId', $modulesIds)
			->delete();

		// Check if any row was deleted
		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'All lessons deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Lesson not found or delete failed']);
		}
	}

	public function createNewSelfworkTheme($semesterId, $lessonTypeId): int
	{
		$selfworkId = Capsule::table('lessons')
			->insertGetId([
				'semesterId' => $semesterId,
				'lessonTypeId' => $lessonTypeId
			]);

		return $selfworkId;
	}

	public function updateSelfworkTheme($field, $value, $selfworkId)
	{
		Capsule::table('lessons')
			->updateOrInsert(
				[
					'id' => $selfworkId,
				],
				[
					$field => $value
				]
			);
	}
}
