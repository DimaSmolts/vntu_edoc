<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="A"
			name="A"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="B"
			name="B"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="C"
			name="C"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="D"
			name="D"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="E"
			name="E"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->E ?? '') ?></textarea>
	</label>
	<label>FX (35-59):
		<textarea
			id="FX"
			name="FX"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->FX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="F"
			name="F"
			rows="10"
			oninput="updateDefaultAssessmentCriteria(event, null, null, true)"><?= htmlspecialchars($assessmentCriterias['general']->F ?? '') ?></textarea>
	</label>
</form>