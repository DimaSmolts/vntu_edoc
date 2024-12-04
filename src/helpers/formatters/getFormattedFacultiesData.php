<?php

require_once __DIR__ . '/../../models/FacultyModel.php';

use App\Models\FacultyModel;

function getFormattedFacultiesData($faculties)
{
	return $faculties->map(function ($faculty) {
		return new FacultyModel(
			$faculty->id,
			$faculty->d_name ?? ''
		);
	});
}
