<?php

function getSemestersIdsByControlType($pointsDistributionRelatedData)
{
	$semestersIdsByControlType = [];

	$semesterWithDifferentialCreditId = [];
	$semesterWithExamId = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			if ($semesterData->examType === "диф. залік") {
				$semesterWithDifferentialCreditId[] = $semesterData->id;
			}
			if ($semesterData->examType === "іспит") {
				$semesterWithExamId[] = $semesterData->id;
			}
		}
	}

	$semestersIdsByControlType['semesterWithDifferentialCreditId'] = $semesterWithDifferentialCreditId;
	$semestersIdsByControlType['semesterWithExamId'] = $semesterWithExamId;

	return $semestersIdsByControlType;
}
