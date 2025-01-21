<?php
require_once __DIR__ . '/../../../helpers/view/getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels.php';

$labels = getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $assessmentCriterias['calculationAndGraphicWork']->taskTypeId);

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за РГР";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->FXAndF ?? '') ?></textarea>
	</label>
</form>