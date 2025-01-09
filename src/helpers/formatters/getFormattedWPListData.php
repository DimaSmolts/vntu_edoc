<?php

require_once __DIR__ . '/../../models/WPListItemModel.php';

use App\Models\WPListItemModel;

function getFormattedWPListData($wps)
{
	return $wps->map(function ($wp) {
		$semesterNumbers = $wp->semesters->map(function ($semester) {
			return $semester->semesterNumber;
		})->toArray();

		return new WPListItemModel(
			$wp->id,
			$wp->disciplineName ?? '',
			$wp->createdAt,
			$wp->specialtiesCodesAndNames,
			implode(', ', $semesterNumbers)
		);
	});
}
