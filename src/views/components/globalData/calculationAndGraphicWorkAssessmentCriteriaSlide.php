<?php
require_once __DIR__ . '/../../../helpers/getTaskId.php';

$taskTypeId = getTaskId()->calculationAndGraphicWork;

$title = "Критерії оцінювання за індивідуальним завданням РГР";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicWork']->FXAndF ?? '') ?></textarea>
	</label>
</form>