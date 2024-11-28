<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти для лабораторних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="labAssessmentCriteriaForA"
			name="labAssessmentCriteriaForA"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="labAssessmentCriteriaForB"
			name="labAssessmentCriteriaForB"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="labAssessmentCriteriaForC"
			name="labAssessmentCriteriaForC"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="labAssessmentCriteriaForD"
			name="labAssessmentCriteriaForD"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="labAssessmentCriteriaForE"
			name="labAssessmentCriteriaForE"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX, F та (0-59):
		<textarea
			id="labAssessmentCriteriaForFXAndF"
			name="labAssessmentCriteriaForFXAndF"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($wpId) ?>)"><?= htmlspecialchars($globalWPData->labAssessmentCriteria->FXAndF ?? '') ?></textarea>
	</label>
</form>