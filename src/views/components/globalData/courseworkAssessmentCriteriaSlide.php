<?php
$title = "Критерії оцінювання за індивідуальним завданням курсової роботи";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForA"
			name="courseworkAssessmentCriteriaForA"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForA ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForB"
			name="courseworkAssessmentCriteriaForB"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForB ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForC"
			name="courseworkAssessmentCriteriaForC"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForC ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForD"
			name="courseworkAssessmentCriteriaForD"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForD ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForE"
			name="courseworkAssessmentCriteriaForE"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForE ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForFX"
			name="courseworkAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForFX ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForF"
			name="courseworkAssessmentCriteriaForF"
			value="<?= htmlspecialchars($data->courseworkAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
</form>