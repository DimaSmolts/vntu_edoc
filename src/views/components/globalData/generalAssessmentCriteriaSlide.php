<?php
$title = "Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A (90-100):
		<textarea
			id="generalAssessmentCriteriaForA"
			name="generalAssessmentCriteriaForA"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForA ?? '') ?></textarea>
	</label>
	<label>B (82-89):
		<textarea
			id="generalAssessmentCriteriaForB"
			name="generalAssessmentCriteriaForB"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForB ?? '') ?></textarea>
	</label>
	<label>C (75-81):
		<textarea
			id="generalAssessmentCriteriaForC"
			name="generalAssessmentCriteriaForC"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForC ?? '') ?></textarea>
	</label>
	<label>D (64-74):
		<textarea
			id="generalAssessmentCriteriaForD"
			name="generalAssessmentCriteriaForD"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForD ?? '') ?></textarea>
	</label>
	<label>E (60-63):
		<textarea
			id="generalAssessmentCriteriaForE"
			name="generalAssessmentCriteriaForE"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForE ?? '') ?></textarea>
	</label>
	<label>FX (35-59):
		<textarea
			id="generalAssessmentCriteriaForFX"
			name="generalAssessmentCriteriaForFX"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForFX ?? '') ?></textarea>
	</label>
	<label>F (0-34):
		<textarea
			id="generalAssessmentCriteriaForF"
			name="generalAssessmentCriteriaForF"
			rows="10"
			oninput="updateGlobalWPData(event)"><?= htmlspecialchars($data->generalAssessmentCriteriaForF ?? '') ?></textarea>
	</label>
</form>