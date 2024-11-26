<?php

require_once __DIR__ . '/../../models/WPListItemModel.php';

use App\Models\WPListItemModel;

function getFormattedWPListData($wps)
{
	return $wps->map(function ($wp) {
		return new WPListItemModel(
			$wp->id,
			$wp->disciplineName,
			$wp->createdAt,
			$wp->specialtyName,
			$wp->academicYear
		);
	});
}
