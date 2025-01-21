<?php

require_once __DIR__ . '/../../models/WorkingProgramGlobalDataModel.php';

use App\Models\WorkingProgramGlobalDataModel;

function getFullFormattedWorkingProgramGlobalData($globalWPData)
{
	return new WorkingProgramGlobalDataModel(
		isset($globalWPData) ? $globalWPData->universityName : '',
		isset($globalWPData) ? $globalWPData->universityShortName : '',
		isset($globalWPData) ? $globalWPData->academicRightsAndResponsibilities : '',
	);
};
