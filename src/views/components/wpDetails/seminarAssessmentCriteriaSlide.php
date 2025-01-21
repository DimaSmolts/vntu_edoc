<?php
require_once __DIR__ . '/../../../helpers/view/getAssesmentCriteriaPointsLabels.php';

$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'seminarPoints');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти для семінарських занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="seminarAssessmentCriteriaForA"
			name="seminarAssessmentCriteriaForA"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->seminarAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="seminarAssessmentCriteriaForB"
			name="seminarAssessmentCriteriaForB"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->seminarAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="seminarAssessmentCriteriaForC"
			name="seminarAssessmentCriteriaForC"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->seminarAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="seminarAssessmentCriteriaForD"
			name="seminarAssessmentCriteriaForD"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->seminarAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="seminarAssessmentCriteriaForE"
			name="seminarAssessmentCriteriaForE"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->seminarAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="seminarAssessmentCriteriaForFXAndF"
			name="seminarAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->seminarAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>