<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за заняттями";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="lessonAssessmentCriteriaForA"
			name="lessonAssessmentCriteriaForA"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="lessonAssessmentCriteriaForB"
			name="lessonAssessmentCriteriaForB"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="lessonAssessmentCriteriaForC"
			name="lessonAssessmentCriteriaForC"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="lessonAssessmentCriteriaForD"
			name="lessonAssessmentCriteriaForD"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="lessonAssessmentCriteriaForE"
			name="lessonAssessmentCriteriaForE"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX (35-59):
		<textarea
			id="lessonAssessmentCriteriaForFX"
			name="lessonAssessmentCriteriaForFX"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->FX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="lessonAssessmentCriteriaForF"
			name="lessonAssessmentCriteriaForF"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->lessonAssessmentCriteria->F ?? '') ?></textarea>
	</label>
</form>