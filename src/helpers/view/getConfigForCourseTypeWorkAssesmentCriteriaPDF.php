<?php
function getConfigForCourseTypeWorkAssesmentCriteriaPDF($structure, $details) {
	$topicTitle = "Критерії оцінювання знань, умінь та навичок здобувачів за результатами виконання ";
	$headerRowSpan = 1;
	$criteriaHeaderColSpan = 1;
	$criteriasForOneTypeOfWork = [];

	if ($structure->isCourseworkExists && $structure->isCourseProjectExists) {
		$topicTitle .= "індивідуальних завданнь курсової роботи та курсового проєкту";
		$headerRowSpan = 2;
		$criteriaHeaderColSpan = 2;
	} else if ($structure->isCourseworkExists) {
		$topicTitle .= "індивідуального завдання курсової роботи";
		$criteriasForOneTypeOfWork = $details->assessmentCriterias['coursework'];
	} else if ($structure->isCourseProjectExists) {
		$topicTitle .= "індивідуального завдання курсового проєкту";
		$criteriasForOneTypeOfWork = $details->assessmentCriterias['courseProject'];
	}

	return (object) [
		'topicTitle' => $topicTitle,
		'headerRowSpan' =>$headerRowSpan,
		'criteriaHeaderColSpan' => $criteriaHeaderColSpan,
		'criteriasForOneTypeOfWork' => $criteriasForOneTypeOfWork,
	];
}
