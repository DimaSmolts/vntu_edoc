<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class LessonService
{
	public function createNewLesson($themeId, $lessonTypeId): int
	{
		$lessonId = Capsule::table('lessons')->insertGetId([
			'themeId' => $themeId,
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
}