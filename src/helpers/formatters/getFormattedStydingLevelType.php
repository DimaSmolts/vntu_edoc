<?php

require_once __DIR__ . '/../../models/StydingLevelTypeModel.php';
require_once __DIR__ . '/../getStydingLevelNumberName.php';

use App\Models\StydingLevelTypeModel;

function getFormattedStydingLevelType($rawStydingLevelType)
{
	$stydingLevelNumberNames = getStydingLevelNumberName();
	$levelNameMatches = [];
	preg_match('/\(.*?\)/', $rawStydingLevelType->l_name, $levelNameMatches);

	$levelName = $levelNameMatches[0];

	$name = $stydingLevelNumberNames->{$rawStydingLevelType->l_prg} . ' ' . $levelName;

	return new StydingLevelTypeModel(
		$rawStydingLevelType->id,
		$name
	);
}
