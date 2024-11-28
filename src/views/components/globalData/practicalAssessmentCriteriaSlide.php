<?php
$title = "Критерії оцінювання практичних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="practicalAssessmentCriteriaForA"
			name="practicalAssessmentCriteriaForA"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->practicalAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="practicalAssessmentCriteriaForB"
			name="practicalAssessmentCriteriaForB"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->practicalAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="practicalAssessmentCriteriaForC"
			name="practicalAssessmentCriteriaForC"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->practicalAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="practicalAssessmentCriteriaForD"
			name="practicalAssessmentCriteriaForD"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->practicalAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="practicalAssessmentCriteriaForE"
			name="practicalAssessmentCriteriaForE"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->practicalAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="practicalAssessmentCriteriaForFXAndF"
			name="practicalAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->practicalAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>