<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за заняттями";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="lessonAssessmentCriteriaForA"
			name="lessonAssessmentCriteriaForA"
			value="<?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->A ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="lessonAssessmentCriteriaForB"
			name="lessonAssessmentCriteriaForB"
			value="<?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->B ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="lessonAssessmentCriteriaForC"
			name="lessonAssessmentCriteriaForC"
			value="<?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->C ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="lessonAssessmentCriteriaForD"
			name="lessonAssessmentCriteriaForD"
			value="<?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->D ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="lessonAssessmentCriteriaForE"
			name="lessonAssessmentCriteriaForE"
			value="<?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->E ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="lessonAssessmentCriteriaForFX"
			name="lessonAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->FX ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="lessonAssessmentCriteriaForF"
			name="lessonAssessmentCriteriaForF"
			value="<?= htmlspecialchars($details->lessonAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
</form>