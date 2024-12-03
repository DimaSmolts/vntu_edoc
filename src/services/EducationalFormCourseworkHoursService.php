<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalFormCourseworkHoursModel.php';

use App\Models\DBEducationalFormCourseworkHoursModel;

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalFormCourseworkHoursService
{
	public function getCourseworkHoursBySemesterId($wpId)
	{
		$themes = DBEducationalFormCourseworkHoursModel::with([
			'semesterEducationalForm.educationalForm'
		])
			->whereHas('semester', function ($query) use ($wpId) {
				$query->where('educationalDisciplineWPId', $wpId);
			})
			->get();

		return $themes;
	}

	public function updateEducationalFormCourseworkHours($semesterId, $educationalFormId, $hours)
	{
		Capsule::table('educationalFormCourseworkHours')->updateOrInsert(
			[
				'educationalFormId' => $educationalFormId,
				'semesterId' => $semesterId
			],
			[
				'hours' => $hours
			]
		);
	}
}
