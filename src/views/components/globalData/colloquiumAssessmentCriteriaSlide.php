<?php
require_once __DIR__ . '/../../../helpers/getTaskId.php';

$taskTypeId = getTaskId()->colloquium;

$title = "Критерії оцінювання колоквіумів";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['colloquium']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['colloquium']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['colloquium']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['colloquium']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['colloquium']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['colloquium']->FXAndF ?? '') ?></textarea>
	</label>
</form>