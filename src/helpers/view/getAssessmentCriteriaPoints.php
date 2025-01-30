<?php

function getAssessmentCriteriaPoints($startedPoints, $ECTS)
{
	if ($startedPoints === 0) {
		return (object) [
			'zero' => 0
		];
	}

	if ($ECTS === 'A') {
		return (object) [
			'min' => round(intval($startedPoints) * 0.9, 2),
			'max' => round(intval($startedPoints), 2),
		];
	};
	if ($ECTS === 'B') {
		return (object) [
			'min' => round(intval($startedPoints) * 0.82, 2),
			'max' => round(intval($startedPoints) * 0.9, 2) - 0.01,
		];
	};
	if ($ECTS === 'C') {
		return (object) [
			'min' => round(intval($startedPoints) * 0.75, 2),
			'max' => round(intval($startedPoints) * 0.82, 2) - 0.01,
		];
	};
	if ($ECTS === 'D') {
		return (object) [
			'min' => round(intval($startedPoints) * 0.64, 2),
			'max' => round(intval($startedPoints) * 0.75, 2) - 0.01,
		];
	};
	if ($ECTS === 'E') {
		return (object) [
			'min' => round(intval($startedPoints) * 0.60, 2),
			'max' => round(intval($startedPoints) * 0.64, 2) - 0.01,
		];
	};
	if ($ECTS === 'FXAndF') {
		return (object) [
			'min' => round(intval($startedPoints) * 0, 2),
			'max' => round(intval($startedPoints) * 0.60, 2) - 0.01,
		];
	};
};
