<?php
require_once __DIR__ . '/../../../helpers/view/getModuleWorkAssesmentCriteriaPointsLabels.php';

$labels = getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'colloquium');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за колоквіумом";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="colloquiumAssessmentCriteriaForA"
			name="colloquiumAssessmentCriteriaForA"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="colloquiumAssessmentCriteriaForB"
			name="colloquiumAssessmentCriteriaForB"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="colloquiumAssessmentCriteriaForC"
			name="colloquiumAssessmentCriteriaForC"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="colloquiumAssessmentCriteriaForD"
			name="colloquiumAssessmentCriteriaForD"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="colloquiumAssessmentCriteriaForE"
			name="colloquiumAssessmentCriteriaForE"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="colloquiumAssessmentCriteriaForFXAndF"
			name="colloquiumAssessmentCriteriaForFXAndF"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>