<?php
require_once __DIR__ . '/../../../helpers/view/getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels.php';

$labels = getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $assessmentCriterias['calculationAndGraphicTask']->taskTypeId);

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за РГЗ";
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
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->A ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->B ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->C ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->D ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->E ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->FXAndF ?? '') ?></textarea>
	</label>
</form>