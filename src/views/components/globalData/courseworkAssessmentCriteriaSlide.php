<?php
$title = "Критерії оцінювання за індивідуальним завданням курсової роботи";
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
	<label>FX (35-59):
		<textarea
			id="courseworkAssessmentCriteriaForFX"
			name="courseworkAssessmentCriteriaForFX"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->FX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="courseworkAssessmentCriteriaForF"
			name="courseworkAssessmentCriteriaForF"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->courseworkAssessmentCriteria->F ?? '') ?></textarea>
	</label>
</form>