<?php
require_once __DIR__ . '/../../../helpers/getTaskId.php';

$taskTypeId = getTaskId()->controlWork;

$title = "Критерії оцінювання контрольних робіт";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['controlWork']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['controlWork']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['controlWork']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['controlWork']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['controlWork']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="2"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['controlWork']->FXAndF ?? '') ?></textarea>
	</label>
</form>