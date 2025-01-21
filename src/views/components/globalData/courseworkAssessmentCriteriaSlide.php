<?php
require_once __DIR__ . '/../../../helpers/getTaskId.php';

$taskTypeId = getTaskId()->coursework;

$title = "Критерії оцінювання за індивідуальним завданням курсової роботи";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['coursework']->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['coursework']->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['coursework']->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['coursework']->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['coursework']->E ?? '') ?></textarea>
	</label>
	<label>FX, F (0-59):
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['coursework']->FXAndF ?? '') ?></textarea>
	</label>
</form>