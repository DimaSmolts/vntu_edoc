<?php
$title = "Критерії оцінювання семінарських занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="seminarAssessmentCriteriaForA"
			name="seminarAssessmentCriteriaForA"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->seminarAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="seminarAssessmentCriteriaForB"
			name="seminarAssessmentCriteriaForB"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->seminarAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="seminarAssessmentCriteriaForC"
			name="seminarAssessmentCriteriaForC"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->seminarAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="seminarAssessmentCriteriaForD"
			name="seminarAssessmentCriteriaForD"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->seminarAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="seminarAssessmentCriteriaForE"
			name="seminarAssessmentCriteriaForE"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->seminarAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="seminarAssessmentCriteriaForFXAndF"
			name="seminarAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->seminarAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>