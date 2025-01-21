<?php
require_once __DIR__ . '/../../../helpers/view/getAssesmentCriteriaPointsLabels.php';

$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'labPoints');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти для лабораторних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="labAssessmentCriteriaForA"
			name="labAssessmentCriteriaForA"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="labAssessmentCriteriaForB"
			name="labAssessmentCriteriaForB"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="labAssessmentCriteriaForC"
			name="labAssessmentCriteriaForC"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="labAssessmentCriteriaForD"
			name="labAssessmentCriteriaForD"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="labAssessmentCriteriaForE"
			name="labAssessmentCriteriaForE"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="labAssessmentCriteriaForFXAndF"
			name="labAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>