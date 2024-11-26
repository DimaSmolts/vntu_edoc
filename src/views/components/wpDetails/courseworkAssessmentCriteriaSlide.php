<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти за індивідуальним завданням курсової роботи";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="courseworkAssessmentCriteriaForA"
			name="courseworkAssessmentCriteriaForA"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->A ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="courseworkAssessmentCriteriaForB"
			name="courseworkAssessmentCriteriaForB"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->B ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="courseworkAssessmentCriteriaForC"
			name="courseworkAssessmentCriteriaForC"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->C ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="courseworkAssessmentCriteriaForD"
			name="courseworkAssessmentCriteriaForD"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->D ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="courseworkAssessmentCriteriaForE"
			name="courseworkAssessmentCriteriaForE"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->E ?? '') ?></textarea>
	</label>
	<label>FX (35-59):
		<textarea
			id="courseworkAssessmentCriteriaForFX"
			name="courseworkAssessmentCriteriaForFX"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->FX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="courseworkAssessmentCriteriaForF"
			name="courseworkAssessmentCriteriaForF"
			rows="5"
			oninput="updateGlobalWPDataForEducationalDiscipline(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->F ?? '') ?></textarea>
	</label>
</form>