<?php
$title = "Загальна інформація";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label id="facultyDropdownLabel">Факультет:
		<select
			id="facultyIdSelect"
			data-wpId=<?= htmlspecialchars($details->id) ?>
			<?php if (isset($details->facultyId)): ?> data-facultyId=<?= htmlspecialchars($details->facultyId) ?><?php endif; ?>>
		</select>
	</label>
	<label id="departmentDropdownLabel">Кафедра:
		<select
			id="departmentIdSelect"
			data-wpId=<?= htmlspecialchars($details->id) ?>
			<?php if (isset($details->departmentId)): ?> data-departmentId=<?= htmlspecialchars($details->departmentId) ?><?php endif; ?>>
		</select>
	</label>
	<label>Дисципліна:
		<input
			type="text"
			id="disciplineName"
			name="disciplineName"
			value="<?= htmlspecialchars($details->disciplineName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label id="stydingLevelDropdownLabel">Рівень вищої освіти:
		<select
			id="stydingLevelIdSelect"
			data-wpId=<?= htmlspecialchars($details->id) ?>
			<?php if (isset($details->stydingLevelId)): ?> data-stydingLevelId=<?= htmlspecialchars($details->stydingLevelId) ?><?php endif; ?>>
		</select>
	</label>
	<label>Галузь знань (немає відповідної таблиці в БД):
		<input
			type="text"
			id="fielfOfStudyName"
			name="fielfOfStudyName"
			value="<?= htmlspecialchars($details->fielfOfStudyName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label>
	<label id="specialtyDropdownLabel" class="multiselect-label">Спеціальність:
		<select
			id="specialtyIdsSelect"
			data-wpId=<?= htmlspecialchars($details->id) ?>
			multiple
			<?php if (isset($details->specialtyIds)): ?> data-specialtyIds=<?= json_encode($details->specialtyIds) ?><?php endif; ?>>
		</select>
	</label>
	<label id="educationalProgramDropdownLabel" class="multiselect-label">Освітня програма:
		<select
			id="educationalProgramIdsSelect"
			data-wpId=<?= htmlspecialchars($details->id) ?>
			multiple
			<?php if (isset($details->educationalProgramIds)): ?> data-educationalProgramIds=<?= json_encode($details->educationalProgramIds) ?><?php endif; ?>>
		</select>
	</label>
	<!-- <label>Освітня програма:
		<input
			type="text"
			id="educationalProgram"
			name="educationalProgram"
			value="<?= htmlspecialchars($details->educationalProgram ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label> -->
	<div class="mini-block">
		<p class="mini-block-title">Документ затверджено:</p>
		<div class="micro-block">
			<?php if ($details->docApprovedBy): ?>
				<label id="docApprovedByLabel">
					Ім'я та прізвище:
					<select
						id="docApprovedBySelect"
						data-wpInvolvedPersonId="<?= htmlspecialchars($details->docApprovedBy->id) ?>"
						data-wpId=<?= htmlspecialchars($details->id) ?>>
						<option
							value=<?= htmlspecialchars($details->docApprovedBy->id) ?>
							selected>
							<?= htmlspecialchars($details->docApprovedBy->surname ?? '') ?> <?= htmlspecialchars($details->docApprovedBy->name ?? '') ?> <?= htmlspecialchars($details->docApprovedBy->patronymicName ?? '') ?>, <?= htmlspecialchars($details->docApprovedBy->workPosition ?? '') ?>
						</option>
					</select>
				</label>
				<label>Посада:
					<input
						placeholder="Проректор з ..."
						type="text"
						name="positionAndMinutesOfMeeting"
						value="<?= htmlspecialchars($details->docApprovedBy->positionAndMinutesOfMeeting ?? '') ?>"
						oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->docApprovedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
				</label>
			<?php else: ?>
				<label id="docApprovedByLabel">
					Ім'я та прізвище:
					<select id="docApprovedBySelect" data-wpId=<?= htmlspecialchars($details->id) ?>></select>
				</label>
			<?php endif; ?>
		</div>
	</div>
	<div class="mini-block">
		<p class="mini-block-title">Деталі робочої програми:</p>
		<label>Рік підготовки:
			<input
				type="number"
				id="academicYear"
				name="academicYear"
				value="<?= htmlspecialchars($details->academicYear ?? '') ?>"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
		</label>
		<label>Кількість кредитів:
			<input
				type="number"
				id="creditsAmount"
				name="creditsAmount"
				value="<?= htmlspecialchars($details->creditsAmount ?? '') ?>"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
		</label>
		<label>Код:
			<input
				type="text"
				id="code"
				name="code"
				placeholder="СУЯ ВНТУ-08-53-РП.023.01:23"
				value="<?= htmlspecialchars($details->code ?? '') ?>"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
		</label>
		<label>Примітка:
			<textarea
				id="notes"
				name="notes"
				rows="5"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->notes ?? '') ?></textarea>
		</label>
	</div>
</form>