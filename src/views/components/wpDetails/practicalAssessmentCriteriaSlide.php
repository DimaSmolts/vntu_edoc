<?php
require_once __DIR__ . '/../../../helpers/view/getAssesmentCriteriaPointsLabels.php';

$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'practicalPoints');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти для практичних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="practicalAssessmentCriteriaForA"
			name="practicalAssessmentCriteriaForA"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= $globalWPData->practicalAssessmentCriteria->A ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="practicalAssessmentCriteriaForB"
			name="practicalAssessmentCriteriaForB"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->practicalAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="practicalAssessmentCriteriaForC"
			name="practicalAssessmentCriteriaForC"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->practicalAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="practicalAssessmentCriteriaForD"
			name="practicalAssessmentCriteriaForD"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->practicalAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="practicalAssessmentCriteriaForE"
			name="practicalAssessmentCriteriaForE"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->practicalAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="practicalAssessmentCriteriaForFXAndF"
			name="practicalAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->practicalAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>