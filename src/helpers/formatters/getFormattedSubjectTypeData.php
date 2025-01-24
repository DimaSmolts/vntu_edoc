<?php

require_once __DIR__ . '/getFormattedSubjectType.php';

function getFormattedSubjectTypeData($rawSubjectTypes)
{
	return $rawSubjectTypes->map(function ($rawSubjectType) {
		return getFormattedSubjectType($rawSubjectType);
	})->toArray();
}
