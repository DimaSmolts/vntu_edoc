<?php
$title = "Загальна інформація";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>Назва навчального закладу:
		<input
			type="text"
			id="universityName"
			name="universityName"
			value="<?= htmlspecialchars($data->universityName ?? '') ?>"
			oninput="updateGlobalData(event)">
	</label>
	<label>Абревіатура навчального закладу:
		<input
			type="text"
			id="universityShortName"
			name="universityShortName"
			value="<?= htmlspecialchars($data->universityShortName ?? '') ?>"
			oninput="updateGlobalData(event)">
	</label>
	<label>Академічні права та обов'язки:
		<textarea
			id="academicRightsAndResponsibilities"
			name="academicRightsAndResponsibilities"
			rows="25"
			oninput="updateGlobalData(event)"><?= htmlspecialchars($data->academicRightsAndResponsibilities ?? '') ?></textarea>
	</label>
</form>