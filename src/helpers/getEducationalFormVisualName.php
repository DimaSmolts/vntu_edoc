<?php

function getEducationalFormVisualName($colName)
{
	$educationalFormMap = [
		'fullTime' => 'Денна',
		'correspondence' => 'Заочна',
		'dual' => 'Дуальна',
	];

	return $educationalFormMap[$colName] ?? $colName;
};
