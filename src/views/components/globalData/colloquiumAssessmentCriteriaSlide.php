<?php
$title = "Критерії оцінювання колоквіумів";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="colloquiumAssessmentCriteriaForA"
			name="colloquiumAssessmentCriteriaForA"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->colloquiumAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="colloquiumAssessmentCriteriaForB"
			name="colloquiumAssessmentCriteriaForB"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->colloquiumAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="colloquiumAssessmentCriteriaForC"
			name="colloquiumAssessmentCriteriaForC"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->colloquiumAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="colloquiumAssessmentCriteriaForD"
			name="colloquiumAssessmentCriteriaForD"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->colloquiumAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="colloquiumAssessmentCriteriaForE"
			name="colloquiumAssessmentCriteriaForE"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->colloquiumAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="colloquiumAssessmentCriteriaForFXAndF"
			name="colloquiumAssessmentCriteriaForFXAndF"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->colloquiumAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>