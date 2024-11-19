<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBThemeModel.php';

use App\Models\DBThemeModel;
use Illuminate\Database\Capsule\Manager as Capsule;

class ThemeService
{
	public function getThemesWithLessonThemesByWPId($wpId)
	{
		$themes = DBThemeModel::with([
			'lections.educationFormLessonHoursFulltime',
			'lections.educationFormLessonHoursCorrespondence',
			'labs.educationFormLessonHoursFulltime',
			'labs.educationFormLessonHoursCorrespondence',
			'practicals.educationFormLessonHoursFulltime',
			'practicals.educationFormLessonHoursCorrespondence',
			'seminars.educationFormLessonHoursFulltime',
			'seminars.educationFormLessonHoursCorrespondence',
			'selfworks.educationFormLessonHoursFulltime',
			'selfworks.educationFormLessonHoursCorrespondence'
		])
			->whereHas('module.semester', function ($query) use ($wpId) {
				// Filter by semester ID
				$query->where('educationalDisciplineWPId', $wpId);
			})
			->get();

		return $themes;
	}

	public function createNewTheme($moduleId): int
	{
		// Use the query builder instead of Eloquent's save() method
		$themeId = Capsule::table('themes')->insertGetId([
			'moduleId' => $moduleId
		]);

		return $themeId;  // Return the last inserted ID
	}

	public function updateTheme($id, $field, $value)
	{
		// Find the theme by ID using Capsule's query builder
		$theme = Capsule::table('themes')->where('id', $id)->first();

		// Check if the theme exists
		if (!$theme) {
			// Return an error message if the theme is not found
			echo json_encode(['status' => 'error', 'message' => 'Theme not found']);
			return;
		}

		// Update the specified field with the new value using Capsule's update method
		$updated = Capsule::table('themes')
			->where('id', $id)
			->update([$field => $value]);

		// Check if the update was successful
		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Theme updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
