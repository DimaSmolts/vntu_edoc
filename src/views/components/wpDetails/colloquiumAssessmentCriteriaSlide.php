<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за колоквіумом";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="colloquiumAssessmentCriteriaForA"
			name="colloquiumAssessmentCriteriaForA"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="colloquiumAssessmentCriteriaForB"
			name="colloquiumAssessmentCriteriaForB"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="colloquiumAssessmentCriteriaForC"
			name="colloquiumAssessmentCriteriaForC"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="colloquiumAssessmentCriteriaForD"
			name="colloquiumAssessmentCriteriaForD"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="colloquiumAssessmentCriteriaForE"
			name="colloquiumAssessmentCriteriaForE"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="colloquiumAssessmentCriteriaForFXAndF"
			name="colloquiumAssessmentCriteriaForFXAndF"
			rows="2"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->colloquiumAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>