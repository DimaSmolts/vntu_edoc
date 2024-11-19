<?php

function getEducationalFormVisualName($colName)
{
	$educationalFormMap = [
		'fullTime' => 'Денна',
		'correspondence' => 'Заочна'
	];

	return $educationalFormMap[$colName] ?? $colName;
};
