<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за індивідуальним завданням курсового проєкту";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['courseProject']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['courseProject']->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['courseProject']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['courseProject']->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['courseProject']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['courseProject']->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['courseProject']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['courseProject']->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['courseProject']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['courseProject']->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateAssessmentCriteria(
				event,
				<?= htmlspecialchars($wpId) ?>,
				null,
				<?= htmlspecialchars($assessmentCriterias['courseProject']->taskTypeId) ?>
			)"><?= htmlspecialchars($assessmentCriterias['courseProject']->FXAndF ?? '') ?></textarea>
	</label>
</form>