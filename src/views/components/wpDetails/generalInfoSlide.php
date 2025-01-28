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
			oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>, true)">
	</label>
	<label id="stydingLevelDropdownLabel">Рівень вищої освіти:
		<select
			id="stydingLevelIdSelect"
			data-wpId=<?= htmlspecialchars($details->id) ?>
			<?php if (isset($details->stydingLevelId)): ?> data-stydingLevelId=<?= htmlspecialchars($details->stydingLevelId) ?><?php endif; ?>>
		</select>
	</label>
	<label>Галузь знань:</label>
	<div id="fieldsOfStudyComponents" class="new-field-of-study-components multiselect-label">
		<select
			id="fieldsOfStudyIdsSelect"
			multiple
			<?php if (isset($details->fieldsOfStudyIds)): ?> data-fieldsOfStudyIds=<?= json_encode($details->fieldsOfStudyIds) ?><?php endif; ?>>
		</select>
		<div class="new-field-of-study-container">
			<label>Додати галузь знань, якщо її немає в випадаючому списку:</label>
			<input
				type="text"
				name="name"
				placeholder="13 Механічна інженерія"
				id="fieldOfStudyName">
			<button
				class="btn"
				type="button"
				onclick="createNewFieldOfStudy(<?= htmlspecialchars($details->id) ?>)">
				Додати
			</button>
		</div>
	</div>

	<?php
	$specialtyWithEducationalProgramIdsIndexes = [];
	if (!empty($details->specialtyWithEducationalProgramIds)) {
		foreach ($details->specialtyWithEducationalProgramIds as $idx => $data) {
			$specialtyWithEducationalProgramIdsIndexes[] = $idx;
		}
	}
	?>
	<div
		id="specialtyContainer"
		class="specialty-container"
		data-indexes=<?= json_encode($specialtyWithEducationalProgramIdsIndexes) ?>>
		<?php if (!empty($details->specialtyWithEducationalProgramIds)): ?>
			<?php foreach ($details->specialtyWithEducationalProgramIds as $idx => $data): ?>
				<div class="specialty-group">
					<label>Спеціальність:
						<select
							id="specialtyIdSelect<?= htmlspecialchars($idx) ?>"
							data-wpId=<?= htmlspecialchars($details->id) ?>
							data-idx=<?= htmlspecialchars($idx) ?>
							<?php if (isset($data->specialtyId)): ?> data-specialtyId=<?= htmlspecialchars($data->specialtyId) ?><?php endif; ?>>
						</select>
					</label>
					<label
						id="educationalProgramIdsLabel<?= htmlspecialchars($idx) ?>"
						class="multiselect-label <?php if (isset($data->specialtyId)): ?>educational-program-visible<?php else: ?>educational-program-invisible<?php endif; ?>">Освітні програми:
						<select
							id="educationalProgramIdsSelect<?= htmlspecialchars($idx) ?>"
							data-wpId=<?= htmlspecialchars($details->id) ?>
							data-idx=<?= htmlspecialchars($idx) ?>
							multiple
							<?php if (!isset($data->specialtyId)): ?>disabled<?php endif; ?>
							<?php if (isset($data->educationalProgramsIds)): ?> data-educationalProgramIds=<?= json_encode($data->educationalProgramsIds) ?><?php endif; ?>>
						</select>
					</label>
					<button
						class="btn remove-specialty-btn"
						type="button"
						onclick="removeSpecialtyGroup(<?= htmlspecialchars($idx) ?>, <?= htmlspecialchars($details->id) ?>)">
						Видалити
					</button>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button
		class="btn create-new-specialty-btn"
		type="button"
		onclick="createNewSpecialtyGroup(<?= htmlspecialchars($details->id) ?>)">
		Додати спеціальність та освітні програми
	</button>

	<div class="block">
		<p class="block-title">Документ затверджено:</p>
		<div
			id="docApprovedByBlock"
			class="<?= $details->docApprovedBy ? 'doc-approved-by-additional-info-block' : 'doc-approved-by-info-block' ?>">
			<label id="docApprovedByLabel">
				Ім'я та прізвище:
				<select
					id="docApprovedBySelect"
					data-wpId=<?= htmlspecialchars($details->id) ?>
					<?php if (isset($details->docApprovedBy)): ?>
					data-docApprovedById=<?= json_encode($details->docApprovedBy->involvedPersonId) ?>
					data-wpInvolvedPersonId=<?= json_encode($details->docApprovedBy->id) ?>
					<?php endif; ?>>
				</select>
			</label>
			<?php if ($details->docApprovedBy): ?>
				<label id="docApprovedByPosition">Посада:
					<input
						placeholder="Проректор з ..."
						type="text"
						name="position"
						value="<?= htmlspecialchars($details->docApprovedBy->position ?? '') ?>"
						oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->docApprovedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
				</label>
			<?php endif; ?>
		</div>
	</div>
	<div class="block">
		<p class="block-title">Деталі робочої програми:</p>
		<label>Рік підготовки:
			<input
				type="number"
				min="1"
				id="academicYear"
				name="academicYear"
				value="<?= htmlspecialchars($details->academicYear ?? '') ?>"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>, true)">
		</label>
		<label id="subjectTypeDropdownLabel">Тип предмету:
			<select
				id="subjectTypeIdSelect"
				data-wpId=<?= htmlspecialchars($details->id) ?>
				<?php if (isset($details->subjectTypeId)): ?> data-subjectTypeId=<?= htmlspecialchars($details->subjectTypeId) ?><?php endif; ?>>
			</select>
		</label>
		<label>Кількість кредитів:
			<input
				type="number"
				min="1"
				id="creditsAmount"
				name="creditsAmount"
				value="<?= htmlspecialchars($details->creditsAmount ?? '') ?>"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>, true)">
		</label>
		<label>Код:
			<input
				type="text"
				id="code"
				name="code"
				placeholder="СУЯ ВНТУ-08-53-РП.023.01:23"
				value="<?= htmlspecialchars($details->code ?? '') ?>"
				oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>, true)">
		</label>
		<!-- Створюємо контейнер для редагування примітки -->
		<label>Примітка:</label>
		<div id="notes" style="height: 100px; margin-bottom: 15px;"></div>
	</div>
</form>