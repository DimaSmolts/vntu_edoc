<?php

require_once __DIR__ . '/../../models/StydingLevelTypeModel.php';
require_once __DIR__ . '/../getStydingLevelNumberName.php';

use App\Models\StydingLevelTypeModel;

function getFormattedStydingLevelTypeData($rawStydingLevelTypesData)
{
	$stydingLevelNumberNames = getStydingLevelNumberName();

	return $rawStydingLevelTypesData->map(function ($rawStydingLevelTypeData) use (&$stydingLevelNumberNames) {
		$levelNameMatches = [];
		preg_match('/\(.*?\)/', $rawStydingLevelTypeData->l_name, $levelNameMatches);

		$levelName = $levelNameMatches[0];


		$name = $stydingLevelNumberNames->{$rawStydingLevelTypeData->l_prg} . ' ' . $levelName;

		return new StydingLevelTypeModel(
			$rawStydingLevelTypeData->id,
			$name
		);
	})->toArray();
}
