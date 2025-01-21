<?php
$title = "Критерії оцінювання за індивідуальним завданням курсової роботи / курсового проєкту";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="courseworkAssessmentCriteriaForA"
			name="courseworkAssessmentCriteriaForA"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="courseworkAssessmentCriteriaForB"
			name="courseworkAssessmentCriteriaForB"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="courseworkAssessmentCriteriaForC"
			name="courseworkAssessmentCriteriaForC"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="courseworkAssessmentCriteriaForD"
			name="courseworkAssessmentCriteriaForD"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="courseworkAssessmentCriteriaForE"
			name="courseworkAssessmentCriteriaForE"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="courseworkAssessmentCriteriaForFXAndF"
			name="courseworkAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>