<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за контролем";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="examAssessmentCriteriaForA"
			name="examAssessmentCriteriaForA"
			value="<?= htmlspecialchars($details->globalData->examAssessmentCriteria->A ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="examAssessmentCriteriaForB"
			name="examAssessmentCriteriaForB"
			value="<?= htmlspecialchars($details->globalData->examAssessmentCriteria->B ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="examAssessmentCriteriaForC"
			name="examAssessmentCriteriaForC"
			value="<?= htmlspecialchars($details->globalData->examAssessmentCriteria->C ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="examAssessmentCriteriaForD"
			name="examAssessmentCriteriaForD"
			value="<?= htmlspecialchars($details->globalData->examAssessmentCriteria->D ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="examAssessmentCriteriaForE"
			name="examAssessmentCriteriaForE"
			value="<?= htmlspecialchars($details->globalData->examAssessmentCriteria->E ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="examAssessmentCriteriaForFX"
			name="examAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($details->globalData->examAssessmentCriteria->FX ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="examAssessmentCriteriaForF"
			name="examAssessmentCriteriaForF"
			value="<?= htmlspecialchars($details->examAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
</form>