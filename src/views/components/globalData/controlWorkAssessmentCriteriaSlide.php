<?php
$title = "Критерії оцінювання контрольних робіт";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="controlWorkAssessmentCriteriaForA"
			name="controlWorkAssessmentCriteriaForA"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->controlWorkAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="controlWorkAssessmentCriteriaForB"
			name="controlWorkAssessmentCriteriaForB"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->controlWorkAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="controlWorkAssessmentCriteriaForC"
			name="controlWorkAssessmentCriteriaForC"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->controlWorkAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="controlWorkAssessmentCriteriaForD"
			name="controlWorkAssessmentCriteriaForD"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->controlWorkAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="controlWorkAssessmentCriteriaForE"
			name="controlWorkAssessmentCriteriaForE"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->controlWorkAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="controlWorkAssessmentCriteriaForFXAndF"
			name="controlWorkAssessmentCriteriaForFXAndF"
			rows="2"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->controlWorkAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>