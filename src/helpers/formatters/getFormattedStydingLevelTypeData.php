<?php

require_once __DIR__ . '/../getStydingLevelNumberName.php';
require_once __DIR__ . '/getFormattedStydingLevelType.php';

function getFormattedStydingLevelTypeData($rawStydingLevelTypesData)
{
	return $rawStydingLevelTypesData->map(function ($rawStydingLevelTypeData) {
		return getFormattedStydingLevelType($rawStydingLevelTypeData);
	})->toArray();
}
