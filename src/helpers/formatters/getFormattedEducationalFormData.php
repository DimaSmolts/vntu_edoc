<?php

require_once __DIR__ . '/../../models/EducationalFormModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';

use App\Models\EducationalFormModel;

function getFormattedEducationalFormData($forms)
{
	return $forms->map(function ($form) {
		return new EducationalFormModel(
			$form->id,
			$form->name,
			getEducationalFormVisualName($form->name)
		);
	});
}
