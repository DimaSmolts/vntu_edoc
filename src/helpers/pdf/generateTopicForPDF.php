<?php

require_once __DIR__ . '/addNumbersToList.php';

function generateTopicForPDF(
	$html2pdf,
	$topicName,
	$details,
	$structure = null,
	$selfworkData = null,
	$pointsDistributionSemestersData = null,
	$pointsDistributionRelatedData = null,
	$semestersIdsByControlType = null,
	$isLesson = false,
	$isSelfwork = false,
	$isPointsDistribution = false,
	$isAssessmentCriteria = false,
) {
	$bottomMargin = 30; // Нижній відступ у мм

	// Обчислюємо відстань яка залишилась, перед додаванням нового розділу
	$currentY = $html2pdf->pdf->getY();
	$pageHeight = $html2pdf->pdf->getPageHeight();

	$usableSpace = $pageHeight - $bottomMargin - $currentY;
	$requiredSpace = getRequiredSpace(
		$isLesson,
		$isSelfwork,
		$isPointsDistribution,
		$pointsDistributionSemestersData,
		$isAssessmentCriteria
	);

	ob_start();

	include __DIR__ . "/../../views/components/pdfTemplate/$topicName.php";

	$topicContent = ob_get_clean();

	if ($topicName === 'literatureTopic') {
		$topicContent = addNumbersToList($topicContent);
	}

	if ($topicName === 'prerequisitesTopic') {
		$html2pdf->pdf->AddPage();

		$html2pdf->writeHTML($topicContent);
	} else if ($usableSpace < $requiredSpace) {
		$html2pdf->pdf->AddPage();

		$html2pdf->writeHTML($topicContent);
	} else {
		$html2pdf->writeHTML("
		<p style='color: white'>.</p>
		$topicContent
		");
	}
}

function getRequiredSpace(
	$isLesson,
	$isSelfwork,
	$isPointsDistribution,
	$pointsDistributionSemestersData,
	$isAssessmentCriteria
) {
	$fontSize = 14;
	$sectionMargins = 3 + 7.41;
	$lineHeight = ($fontSize * 1.2) / 2.83464567;
	$sectionHeight = $lineHeight + $sectionMargins;

	if ($isLesson) {
		return $sectionHeight + (6 * $lineHeight);
	} else if ($isSelfwork) {
		return $sectionHeight + (7 * $lineHeight);
	} else if ($isPointsDistribution && !empty($pointsDistributionSemestersData)) {
		$semestersAmount = count($pointsDistributionSemestersData);

		if ($semestersAmount > 1) {
			return $sectionHeight + (8 * $lineHeight);
		}

		return $sectionHeight + (6 * $lineHeight);
	} else if ($isAssessmentCriteria) {
		return $sectionHeight + (12 * $lineHeight);
	} else {
		return $sectionHeight + (2 * $lineHeight);
	}
}
