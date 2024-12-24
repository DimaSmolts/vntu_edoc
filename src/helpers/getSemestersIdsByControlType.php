<?php

function getSemestersIdsByControlType($pointsDistributionRelatedData)
{
	$semestersIdsByControlType = [];

	$semesterWithDifferentialCreditId = [];
	$semesterWithExamId = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			if ($semesterData->examTypeId === 2) {
				$semesterWithDifferentialCreditId[] = $semesterData->id;
			}
			if ($semesterData->examTypeId === 0) {
				$semesterWithExamId[] = $semesterData->id;
			}
		}
	}

	$semestersIdsByControlType['semesterWithDifferentialCreditId'] = $semesterWithDifferentialCreditId;
	$semestersIdsByControlType['semesterWithExamId'] = $semesterWithExamId;

	return $semestersIdsByControlType;
}
