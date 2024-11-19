<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class WPInvolvedPersonService
{
	public function updateWorkingProgramInvolvedPerson($wpInvolvedPersonId, $wpId, $personId, $involvedPersonRoleId)
	{
		Capsule::table('workingProgramInvolvedPersons')
			->updateOrInsert(
				['id' => $wpInvolvedPersonId],
				[
					'educationalDisciplineWPId' => $wpId,
					'personId' => $personId,
					'involvedPersonRoleId' => $involvedPersonRoleId
				]
			);
	}
}
