<?php
require_once __DIR__ . '/../../../helpers/getTaskId.php';

$taskTypeId = getTaskId()->calculationAndGraphicTask;

$title = "Критерії оцінювання за індивідуальним завданням РГЗ";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, <?= htmlspecialchars($taskTypeId) ?>)"><?= htmlspecialchars($assessmentCriterias['calculationAndGraphicTask']->FXAndF ?? '') ?></textarea>
	</label>
</form>