<?php
$title = "Загальна інформація";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label id="facultyDropdownLabel">Факультет:
		<?php if (!empty($details->facultyId)): ?>
			<select
				id="facultyDropdown"
				name="facultyId"
				onchange="updateFaculty(event, <?= htmlspecialchars($details->id) ?>)">
				<?php foreach ($faculties as $faculty): ?>
					<option value="<?= htmlspecialchars($faculty->id) ?>" <?php if ($faculty->id == $details->facultyId): ?>selected<?php endif; ?>>
						<?= htmlspecialchars($faculty->name) ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php else: ?>
			<select
				id="facultyDropdown"
				name="facultyId"
				onchange="updateFaculty(event, <?= htmlspecialchars($details->id) ?>)">
				<option></option>
				<?php foreach ($faculties as $faculty): ?>
					<option value="<?= htmlspecialchars($faculty->id) ?>">
						<?= htmlspecialchars($faculty->name) ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>
	</label>
	<?php if (!empty($details->facultyId)): ?>
		<div id="departmentDropdownLabelContainer">
			<label id="departmentDropdownLabel">Кафедра:
				<?php if (!empty($details->departmentId)): ?>
					<select
						name="departmentId"
						onchange="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
						<?php foreach ($departments as $department): ?>
							<option value="<?= htmlspecialchars($department->id) ?>" <?php if ($department->id == $details->departmentId): ?>selected<?php endif; ?>>
								<?= htmlspecialchars($department->name) ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php else: ?>
					<select
						name="departmentId"
						onchange="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
						<option></option>
						<?php foreach ($departments as $department): ?>
							<option value="<?= htmlspecialchars($department->id) ?>">
								<?= htmlspecialchars($department->name) ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
			</label>
		</div>
	<?php endif; ?>
	<!-- <label>Кафедра:
		<input
			type="text"
			id="departmentName"
			name="departmentName"
			value="<?= htmlspecialchars($details->departmentName ?? '') ?>"
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)">
	</label> -->
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
							<?= htmlspecialchars($details->docApprovedBy->name ?? '') ?>, <?= htmlspecialchars($details->docApprovedBy->workPosition ?? '') ?>
						</option>
					</select>
				</label>
				<label>Cтупінь:
					<input
						placeholder="к.т.н."
						type="text"
						name="degree"
						value="<?= htmlspecialchars($details->docApprovedBy->degree ?? '') ?>"
						oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->docApprovedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
				</label>
				<label>Посада. Протокол засідання:</label>
				<div id="docApprovedByPosition" style="height: 100px">
					<?= $details->docApprovedBy->positionAndMinutesOfMeeting ?? '' ?>
				</div>
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