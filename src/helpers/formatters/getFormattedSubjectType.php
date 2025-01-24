<?php

require_once __DIR__ . '/../../models/SubjectTypeModel.php';

use App\Models\SubjectTypeModel;

function getFormattedSubjectType($rawSubjectType)
{
	return new SubjectTypeModel(
		$rawSubjectType->id,
		$rawSubjectType->subj_type
	);
}
