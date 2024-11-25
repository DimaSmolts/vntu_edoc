<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за індивідуальним завданням курсової роботи";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForA"
			name="courseworkAssessmentCriteriaForA"
			value="<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->A ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForB"
			name="courseworkAssessmentCriteriaForB"
			value="<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->B ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForC"
			name="courseworkAssessmentCriteriaForC"
			value="<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->C ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForD"
			name="courseworkAssessmentCriteriaForD"
			value="<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->D ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForE"
			name="courseworkAssessmentCriteriaForE"
			value="<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->E ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForFX"
			name="courseworkAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->FX ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="courseworkAssessmentCriteriaForF"
			name="courseworkAssessmentCriteriaForF"
			value="<?= htmlspecialchars($details->courseworkAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
</form>