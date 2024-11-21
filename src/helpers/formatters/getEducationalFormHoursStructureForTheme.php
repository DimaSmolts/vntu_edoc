<?php

require_once __DIR__ . '/../../models/EducationalFormHoursStructureModel.php';
require_once __DIR__ . '/../getHoursSumByEducationalForm.php';

use App\Models\EducationalFormHoursStructureModel;

function getEducationalFormHoursStructureForTheme($educationalFormName, $lections, $practicals, $seminars, $labs, $selfworks)
{
	$lectionsHoursTotal = getHoursSumByEducationalForm($lections, $educationalFormName);
	$practicalsHoursTotal = getHoursSumByEducationalForm($practicals, $educationalFormName);
	$seminarsHoursTotal = getHoursSumByEducationalForm($seminars, $educationalFormName);
	$labsHoursTotal = getHoursSumByEducationalForm($labs, $educationalFormName);
	$selfworksHoursTotal = getHoursSumByEducationalForm($selfworks, $educationalFormName);

	$hoursTotal = $lectionsHoursTotal + $practicalsHoursTotal + $seminarsHoursTotal + $labsHoursTotal + $selfworksHoursTotal;

	return new EducationalFormHoursStructureModel(
		$educationalFormName,
		$lectionsHoursTotal,
		$practicalsHoursTotal,
		$seminarsHoursTotal,
		$labsHoursTotal,
		$selfworksHoursTotal,
		$hoursTotal
	);
};
