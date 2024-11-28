<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="generalAssessmentCriteriaForA"
			name="generalAssessmentCriteriaForA"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="generalAssessmentCriteriaForB"
			name="generalAssessmentCriteriaForB"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="generalAssessmentCriteriaForC"
			name="generalAssessmentCriteriaForC"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="generalAssessmentCriteriaForD"
			name="generalAssessmentCriteriaForD"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="generalAssessmentCriteriaForE"
			name="generalAssessmentCriteriaForE"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX (35-59):
		<textarea
			id="generalAssessmentCriteriaForFX"
			name="generalAssessmentCriteriaForFX"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->FX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="generalAssessmentCriteriaForF"
			name="generalAssessmentCriteriaForF"
			rows="5"
			oninput="updateWorkingProgramGlobalDataOverwrite(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->F ?? '') ?></textarea>
	</label>
</form>