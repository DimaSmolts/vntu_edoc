<?php
require_once __DIR__ . '/../../../helpers/view/getModuleWorkAssesmentCriteriaPointsLabels.php';

$labels = getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'colloquium');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за колоквіумом";
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
				<?= htmlspecialchars($assessmentCriterias['colloquium']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['colloquium']->A ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['colloquium']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['colloquium']->B ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['colloquium']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['colloquium']->C ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['colloquium']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['colloquium']->D ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['colloquium']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['colloquium']->E ?? '') ?></textarea>
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
				<?= htmlspecialchars($assessmentCriterias['colloquium']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['colloquium']->FXAndF ?? '') ?></textarea>
	</label>
</form>