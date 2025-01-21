<?php
require_once __DIR__ . '/../../../helpers/view/getModuleWorkAssesmentCriteriaPointsLabels.php';

$labels = getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'controlWork');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за результатами контрольних робіт";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="controlWorkAssessmentCriteriaForA"
			name="controlWorkAssessmentCriteriaForA"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->controlWorkAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="controlWorkAssessmentCriteriaForB"
			name="controlWorkAssessmentCriteriaForB"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->controlWorkAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="controlWorkAssessmentCriteriaForC"
			name="controlWorkAssessmentCriteriaForC"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->controlWorkAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="controlWorkAssessmentCriteriaForD"
			name="controlWorkAssessmentCriteriaForD"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->controlWorkAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="controlWorkAssessmentCriteriaForE"
			name="controlWorkAssessmentCriteriaForE"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->controlWorkAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="controlWorkAssessmentCriteriaForFXAndF"
			name="controlWorkAssessmentCriteriaForFXAndF"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->controlWorkAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>