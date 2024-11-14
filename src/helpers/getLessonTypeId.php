<?php
function getLessonTypeId($lessonTypes, $lessonTypeName)
{
	$lessonTypeId = null;

	foreach ($lessonTypes as $lessonType) {
		if ($lessonType->name === $lessonTypeName) {
			$lessonTypeId = $lessonType->id;
			break;
		}
	}

	return $lessonTypeId;
}
