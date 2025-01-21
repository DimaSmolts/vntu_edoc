<?php
$title = "Критерії оцінювання за додатковими завданнями";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, null, null, true)"><?= htmlspecialchars($assessmentCriterias['additionalTasks']->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, null, null, true)"><?= htmlspecialchars($assessmentCriterias['additionalTasks']->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, null, null, true)"><?= htmlspecialchars($assessmentCriterias['additionalTasks']->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, null, null, true)"><?= htmlspecialchars($assessmentCriterias['additionalTasks']->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, null, null, true)"><?= htmlspecialchars($assessmentCriterias['additionalTasks']->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, null, null, null, true)"><?= htmlspecialchars($assessmentCriterias['additionalTasks']->FXAndF ?? '') ?></textarea>
	</label>
</form>