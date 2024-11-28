<?php
$title = "Критерії оцінювання лабораторних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="labAssessmentCriteriaForA"
			name="labAssessmentCriteriaForA"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->labAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="labAssessmentCriteriaForB"
			name="labAssessmentCriteriaForB"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->labAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="labAssessmentCriteriaForC"
			name="labAssessmentCriteriaForC"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->labAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="labAssessmentCriteriaForD"
			name="labAssessmentCriteriaForD"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->labAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="labAssessmentCriteriaForE"
			name="labAssessmentCriteriaForE"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->labAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="labAssessmentCriteriaForFXAndF"
			name="labAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->labAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>