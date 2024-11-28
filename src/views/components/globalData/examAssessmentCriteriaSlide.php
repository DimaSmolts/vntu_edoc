<?php
$title = "Критерії оцінювання за контролем";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="examAssessmentCriteriaForA"
			name="examAssessmentCriteriaForA"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="examAssessmentCriteriaForB"
			name="examAssessmentCriteriaForB"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="examAssessmentCriteriaForC"
			name="examAssessmentCriteriaForC"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="examAssessmentCriteriaForD"
			name="examAssessmentCriteriaForD"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="examAssessmentCriteriaForE"
			name="examAssessmentCriteriaForE"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX (35-59):
		<textarea
			id="examAssessmentCriteriaForFX"
			name="examAssessmentCriteriaForFX"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->FX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="examAssessmentCriteriaForF"
			name="examAssessmentCriteriaForF"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->examAssessmentCriteria->F ?? '') ?></textarea>
	</label>
</form>