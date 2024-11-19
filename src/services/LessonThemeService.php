<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class LessonThemeService
{
	public function createNewLessonTheme($themeId, $lessonTypeId): int
	{
		$lessonThemeId = Capsule::table('lessonThemes')->insertGetId([
			'themeId' => $themeId,
			'lessonTypeId' => $lessonTypeId
		]);

		return $lessonThemeId;
	}

	public function updateLessonTheme($id, $field, $value)
	{
		$lessonTheme = Capsule::table('lessonThemes')->where('id', $id)->first();

		if (!$lessonTheme) {
			echo json_encode(['status' => 'error', 'message' => 'Lesson theme not found']);
			return;
		}

		$updated = Capsule::table('lessonThemes')
			->where('id', $id)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Lesson theme updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
