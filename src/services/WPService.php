<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalDisciplineWorkingProgramModel.php';

use App\Models\DBEducationalDisciplineWorkingProgramModel;
use Illuminate\Database\Capsule\Manager as Capsule;

class WPService
{
	public function getWPList()
	{
		$workingPrograms = DBEducationalDisciplineWorkingProgramModel::select(['id', 'disciplineName', 'createdAt'])
			->orderBy('createdAt')
			->get();

		return $workingPrograms;
	}

	public function createNewWP($disciplineName)
	{
		$wpId = Capsule::table('educationalDisciplineWorkingProgram')->insertGetId([
			'disciplineName' => $disciplineName
		]);

		return $wpId;
	}

	public function updateWPDetails($id, $field, $value)
	{
		$wpDetails = Capsule::table('educationalDisciplineWorkingProgram')->where('id', $id)->first();

		if (!$wpDetails) {
			echo json_encode(['status' => 'error', 'message' => 'WP not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineWorkingProgram')
			->where('id', $id)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'WP details updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function getWPDetails($id)
	{
		$wps = DBEducationalDisciplineWorkingProgramModel::with([
			'semesters' => function ($query) {
				$query->orderBy('semesterNumber');
			},
			'semesters.modules' => function ($query) {
				$query->orderBy('moduleNumber');
			},
			'semesters.modules.themes' => function ($query) {
				$query->orderBy('themeNumber');
			},
			'createdByPersons' => function ($query) {
				$query->with(['person', 'involvedRole']);
			},
			'semesters.educationalForms.educationalForm'
		])
			->where('id', $id)
			->get();

		return $wps->first();
	}

	public function getWPDetailsForPDF($id)
	{
		$wps = DBEducationalDisciplineWorkingProgramModel::with([
			'semesters' => function ($query) {
				$query->orderBy('semesterNumber');
			},
			'semesters.modules' => function ($query) {
				$query->orderBy('moduleNumber');
			},
			'semesters.modules.themes' => function ($query) {
				$query->orderBy('themeNumber')
					->with([
						'lections.educationalFormLessonHours.educationalForm',
						'labs.educationalFormLessonHours.educationalForm',
						'practicals.educationalFormLessonHours.educationalForm',
						'seminars.educationalFormLessonHours.educationalForm',
						'selfworks.educationalFormLessonHours.educationalForm',
					]);
			},
			'createdByPersons' => function ($query) {
				$query->with(['person', 'involvedRole']);
			},
			'semesters.educationalForms.educationalForm'
		])
			->where('id', $id)
			->get();

		return $wps->first();
	}
}
