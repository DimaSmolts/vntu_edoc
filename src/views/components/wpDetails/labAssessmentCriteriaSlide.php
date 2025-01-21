<?php
require_once __DIR__ . '/../../../helpers/view/getAssesmentCriteriaPointsLabels.php';

$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'labPoints');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти для лабораторних занять";
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
				<?= htmlspecialchars($assessmentCriterias['lab']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['lab']->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['lab']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['lab']->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['lab']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['lab']->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['lab']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['lab']->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['lab']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['lab']->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['lab']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['lab']->FXAndF ?? '') ?></textarea>
	</label>
</form>