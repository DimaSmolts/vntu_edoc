<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class WPInvolvedPersonService
{
	public function updateWorkingProgramInvolvedPerson(
		$wpInvolvedPersonId,
		$wpId,
		$personId,
		$involvedPersonRoleId
	) {
		Capsule::table('workingProgramInvolvedPersons')
			->updateOrInsert(
				['id' => $wpInvolvedPersonId],
				[
					'educationalDisciplineWPId' => $wpId,
					'personId' => $personId,
					'involvedPersonRoleId' => $involvedPersonRoleId
				]
			);

		$involvedPerson = Capsule::table('workingProgramInvolvedPersons')
			->where('educationalDisciplineWPId', $wpId)
			->where('personId', $personId)
			->where('involvedPersonRoleId', $involvedPersonRoleId)
			->first();

		return $involvedPerson->id;
	}

	public function updateWorkingProgramInvolvedPersonDetails(
		$wpInvolvedPersonId,
		$wpId,
		$field,
		$value
	) {
		Capsule::table('workingProgramInvolvedPersons')
			->updateOrInsert(
				['id' => $wpInvolvedPersonId],
				[
					'educationalDisciplineWPId' => $wpId,
					$field => $value
				]
			);
	}

	public function deleteWPInvolvedPerson($id)
	{
		// Use Capsule to delete the theme by ID
		$deleted = Capsule::table('workingProgramInvolvedPersons')->where('id', $id)->delete();

		// Check if any row was deleted
		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Involved person deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Involved person not found or delete failed']);
		}
	}
}
