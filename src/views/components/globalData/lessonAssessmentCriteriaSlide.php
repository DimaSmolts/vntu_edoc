<?php
$title = "Критерії оцінювання за заняттями";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="lessonAssessmentCriteriaForA"
			name="lessonAssessmentCriteriaForA"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForA ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="lessonAssessmentCriteriaForB"
			name="lessonAssessmentCriteriaForB"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForB ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="lessonAssessmentCriteriaForC"
			name="lessonAssessmentCriteriaForC"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForC ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="lessonAssessmentCriteriaForD"
			name="lessonAssessmentCriteriaForD"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForD ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="lessonAssessmentCriteriaForE"
			name="lessonAssessmentCriteriaForE"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForE ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="lessonAssessmentCriteriaForFX"
			name="lessonAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForFX ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="lessonAssessmentCriteriaForF"
			name="lessonAssessmentCriteriaForF"
			value="<?= htmlspecialchars($data->lessonAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
</form>