<?php

function getLessonTypeIdByName()
{
	return (object) [
		'lection' => 1,
		'practical' => 2,
		'seminar' => 3,
		'laboratory' => 4,
		'selfwork' => 5,
	];
};
