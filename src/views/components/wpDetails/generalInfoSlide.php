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