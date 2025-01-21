<?php
require_once __DIR__ . '/../../../helpers/view/getAssesmentCriteriaPointsLabels.php';

$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'seminarPoints');

$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти для семінарських занять";
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
				<?= htmlspecialchars($assessmentCriterias['seminar']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['seminar']->A ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['B']) ?>
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['seminar']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['seminar']->B ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['C']) ?>
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['seminar']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['seminar']->C ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['D']) ?>
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['seminar']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['seminar']->D ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['E']) ?>
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['seminar']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['seminar']->E ?? '') ?></textarea>
	</label>
	<label><?= htmlspecialchars($labels['FXAndF']) ?>
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				<?= htmlspecialchars($assessmentCriterias['seminar']->lessonTypeId) ?>,
				null
			)"><?= htmlspecialchars($assessmentCriterias['seminar']->FXAndF ?? '') ?></textarea>
	</label>
</form>