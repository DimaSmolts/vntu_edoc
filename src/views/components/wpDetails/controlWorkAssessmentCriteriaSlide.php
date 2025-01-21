<?php
require_once __DIR__ . '/../../../helpers/view/getModuleWorkAssesmentCriteriaPointsLabels.php';

$labels = getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'controlWork');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за результатами контрольних робіт";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label><?= htmlspecialchars($labels['A']) ?>
		<textarea
			id="A"
			name="A"
			rows="2"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['controlWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['controlWork']->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="B"
			name="B"
			rows="2"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['controlWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['controlWork']->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="C"
			name="C"
			rows="2"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['controlWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['controlWork']->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="D"
			name="D"
			rows="2"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['controlWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['controlWork']->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="E"
			name="E"
			rows="2"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['controlWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['controlWork']->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="2"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['controlWork']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['controlWork']->FXAndF ?? '') ?></textarea>
	</label>
</form>