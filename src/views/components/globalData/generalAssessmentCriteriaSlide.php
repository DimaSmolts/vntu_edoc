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
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForA ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>B (82-89)
		<input
			type="text"
			id="generalAssessmentCriteriaForB"
			name="generalAssessmentCriteriaForB"
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForB ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>C (75-81)
		<input
			type="text"
			id="generalAssessmentCriteriaForC"
			name="generalAssessmentCriteriaForC"
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForC ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>D (64-74)
		<input
			type="text"
			id="generalAssessmentCriteriaForD"
			name="generalAssessmentCriteriaForD"
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForD ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>E (60-63)
		<input
			type="text"
			id="generalAssessmentCriteriaForE"
			name="generalAssessmentCriteriaForE"
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForE ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>FX (35-59)
		<input
			type="text"
			id="generalAssessmentCriteriaForFX"
			name="generalAssessmentCriteriaForFX"
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForFX ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
	<label>F (0-34)
		<input
			type="text"
			id="generalAssessmentCriteriaForF"
			name="generalAssessmentCriteriaForF"
			value="<?= htmlspecialchars($data->generalAssessmentCriteriaForF ?? '') ?>"
			oninput="updateGlobalWPData(event)">
	</label>
</form>