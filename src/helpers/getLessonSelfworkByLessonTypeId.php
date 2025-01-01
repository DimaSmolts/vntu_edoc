<?php

function getLessonSelfworkByLessonTypeId($semester, $lessonTypeId)
{
	if (!empty($semester->educationalFormLessonSelfworkHours)) {
		$filteredLessonSelfworkHours = $semester->educationalFormLessonSelfworkHours->filter(function ($lessonSelfworkHours) use (&$lessonTypeId) {
			return $lessonSelfworkHours->lessonTypeId === $lessonTypeId;
		});

		return $filteredLessonSelfworkHours;
	}
};
