<?php
$title = "Загальна інформація";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>Факультет:
		<input
			type="text"
			id="facultyName"
			name="facultyName"
			value="<?= htmlspecialchars($details->facultyName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>Кафедра:
		<input
			type="text"
			id="departmentName"
			name="departmentName"
			value="<?= htmlspecialchars($details->departmentName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>Дисципліна:
		<input
			type="text"
			id="disciplineName"
			name="disciplineName"
			value="<?= htmlspecialchars($details->disciplineName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>Рівень вищої освіти:
		<input
			type="text"
			id="degreeName"
			name="degreeName"
			value="<?= htmlspecialchars($details->degreeName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>Галузь знань:
		<input
			type="text"
			id="fielfOfStudyName"
			name="fielfOfStudyName"
			value="<?= htmlspecialchars($details->fielfOfStudyName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>Спеціальність:
		<input
			type="text"
			id="specialtyName"
			name="specialtyName"
			value="<?= htmlspecialchars($details->specialtyName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label>Освітня програма:
		<input
			type="text"
			id="educationalProgram"
			name="educationalProgram"
			value="<?= htmlspecialchars($details->educationalProgram ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<div class="mini-block">
		<p class="mini-block-title">Документ затверджено:</p>
		<label>Посада:
			<input placeholder="Посада" type="text" id="docApprovedByPosition" name="docApprovedByPosition" oninput="updateGeneralInfo(event)">
		</label>
		<label>Ім'я та прізвище:
			<input placeholder="Іван Іванов" type="text" id="docApprovedByName"
				name="docApprovedByName" oninput="">
		</label>
	</div>
</form>