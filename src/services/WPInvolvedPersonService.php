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
}
