<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100)
		<input
			type="text"
			id="generalAssessmentCriteriaForA"
			name="generalAssessmentCriteriaForA"
			value="<?= htmlspecialchars($details->globalData->generalAssessmentCriteria->A ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="generalAssessmentCriteriaForB"
			name="generalAssessmentCriteriaForB"
			value="<?= htmlspecialchars($details->globalData->generalAssessmentCriteria->B ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="generalAssessmentCriteriaForC"
			name="generalAssessmentCriteriaForC"
			value="<?= htmlspecialchars($details->globalData->generalAssessmentCriteria->C ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="generalAssessmentCriteriaForD"
			name="generalAssessmentCriteriaForD"
			value="<?= htmlspecialchars($details->globalData->generalAssessmentCriteria->D ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="generalAssessmentCriteriaForE"
			name="generalAssessmentCriteriaForE"
			value="<?= htmlspecialchars($details->globalData->generalAssessmentCriteria->E ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="generalAssessmentCriteriaForFX"
			name="generalAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($details->globalData->generalAssessmentCriteria->FX ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="generalAssessmentCriteriaForF"
			name="generalAssessmentCriteriaForF"
			value="<?= htmlspecialchars($details->generalAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
</form>