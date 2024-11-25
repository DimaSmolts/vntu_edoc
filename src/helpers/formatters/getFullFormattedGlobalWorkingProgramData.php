<?php

require_once __DIR__ . '/../../models/GlobalWorkingProgramsDataModel.php';

use App\Models\GlobalWorkingProgramsDataModel;

function getFullFormattedGlobalWorkingProgramData($rawGlobalWPData)
{
	// Створюємо початкову модель глобальних даних
	$globalWPData = new GlobalWorkingProgramsDataModel();

	foreach ($rawGlobalWPData as $rawGlobalWPRow) {
		// Перебираємо всі стрічки глобальних даних та додаємо в модель
		$globalWPData->{$rawGlobalWPRow->name} = $rawGlobalWPRow->value;
	}

	return $globalWPData;
};
