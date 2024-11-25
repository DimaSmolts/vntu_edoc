<?php
$title = "Критерії оцінювання за контролем";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="examAssessmentCriteriaForA"
			name="examAssessmentCriteriaForA"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForA ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="examAssessmentCriteriaForB"
			name="examAssessmentCriteriaForB"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForB ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="examAssessmentCriteriaForC"
			name="examAssessmentCriteriaForC"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForC ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="examAssessmentCriteriaForD"
			name="examAssessmentCriteriaForD"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForD ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="examAssessmentCriteriaForE"
			name="examAssessmentCriteriaForE"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForE ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="examAssessmentCriteriaForFX"
			name="examAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForFX ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="examAssessmentCriteriaForF"
			name="examAssessmentCriteriaForF"
			value="<?= htmlspecialchars($data->examAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
</form>