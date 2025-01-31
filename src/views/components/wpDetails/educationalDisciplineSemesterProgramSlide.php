<?php
$title = "Програма навчальної дисципліни";

$semestersIds = [];
$modulesIds = [];

if (!empty($details->semesters)) {
	foreach ($details->semesters as $semesterData) {
		$semestersIds[] = $semesterData->id;
		if (!empty($semesterData->modules)) {
			foreach ($semesterData->modules as $module) {
				$modulesIds[] = $module->moduleId;
			}
		}
	}
}
?>

<?php include __DIR__ . '/../header.php'; ?>

<div
	id="educationalDisciplineSemesterProgram"
	class="wp-form"
	data-semestersIds=<?= json_encode($semestersIds) ?>
	data-modulesIds=<?= json_encode($modulesIds) ?>>
	<div id="semestersContainer">
		<?php if (!empty($details->semesters)): ?>
			<?php foreach ($details->semesters as $semesterData): ?>
				<!-- Створення контейнера з інформацією про існуючий семестр -->
				<div id="semesterBlock<?= htmlspecialchars($semesterData->id) ?>" class="block">
					<div class="semester-title-container">
						<p id="semesterTitle<?= htmlspecialchars($semesterData->id) ?>" class="block-title semester-title">Семестер <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?></p>
						<button
							class="btn"
							onclick="openApproveDeletingModal('семестр', (event)=>deleteSemester(event, <?= htmlspecialchars($semesterData->id) ?>))">
							Видалити семестр
						</button>
					</div>
					<!-- Створення блоку з даними про існуючий семестр -->
					<div class="semester-data-block">
						<label>
							<p>Номер семестру:</p>
							<input
								type="number"
								name="semesterNumber"
								value="<?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?>"
								oninput="updateNumberInput(event, <?= htmlspecialchars($semesterData->id) ?>, `semesterTitle<?= htmlspecialchars($semesterData->id) ?>`, 'Семестер', updateSemesterInfo)">
						</label>
						<label id="examTypeDropdownLabel">Вид контролю:
							<select
								id="examType<?= htmlspecialchars($semesterData->id) ?>IdSelect"
								<?php if (isset($semesterData->examTypeId)): ?> data-examTypeId=<?= htmlspecialchars($semesterData->examTypeId) ?>
								<?php else: ?> data-examTypeId=<?= json_encode(null) ?>
								<?php endif; ?>>
							</select>
						</label>
					</div>
					<div id="modulesContainer<?= htmlspecialchars($semesterData->id) ?>" class="modules-container">
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<div id="moduleBlock<?= htmlspecialchars($moduleData->moduleId) ?>" class="block">
									<div class="module-title-container">
										<p class="block-title module-title" id="moduleTitle<?= htmlspecialchars($moduleData->moduleId) ?>">Mодуль <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : "" ?></p>
										<button
											class="btn module-btn"
											onclick="openApproveDeletingModal('модуль', (event)=>deleteModule(event, <?= htmlspecialchars($moduleData->moduleId) ?>))">
											Видалити модуль
										</button>
									</div>
									<div class="module-data-block">
										<label>
											<p>Номер модуля:</p>
											<input
												type="number"
												name="moduleNumber"
												value="<?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : "" ?>"
												oninput="updateNumberInput(event, <?= htmlspecialchars($moduleData->moduleId) ?>, 'moduleTitle<?= htmlspecialchars($moduleData->moduleId) ?>', 'Модуль', updateModuleInfo);">
										</label>
										<label>
											<p>Назва:</p>
											<input
												type="text"
												name="name"
												value="<?= htmlspecialchars($moduleData->moduleName) ?>"
												oninput="updateModuleInfo(event, <?= htmlspecialchars($moduleData->moduleId) ?>)">
										</label>
									</div>
									<div id="themesContainer<?= htmlspecialchars($moduleData->moduleId) ?>" class="themes-container">
										<?php if (!empty($moduleData->themes)): ?>
											<?php foreach ($moduleData->themes as $themeData): ?>
												<div id="themeBlock<?= htmlspecialchars($themeData->themeId) ?>" class="block theme-block">
													<div class="theme-title-container">
														<p class="block-title theme-title" id="themeTitle<?= htmlspecialchars($themeData->themeId) ?>">Тема <?= $themeData->themeNumber ? htmlspecialchars($themeData->themeNumber) : "" ?></p>
														<button
															class="btn theme-btn"
															onclick="openApproveDeletingModal('тему', (event)=>deleteTheme(event, <?= htmlspecialchars($themeData->themeId) ?>))">
															Видалити тему
														</button>
													</div>
													<div class="theme-data-block">
														<label>
															<p>Номер теми:</p>
															<input
																type="number"
																name="themeNumber"
																value="<?= $themeData->themeNumber ? htmlspecialchars($themeData->themeNumber) : "" ?>"
																oninput="updateNumberInput(event, <?= htmlspecialchars($themeData->themeId) ?>, 'themeTitle<?= htmlspecialchars($themeData->themeId) ?>', 'Тема', updateThemeInfo);">
														</label>
														<label>
															<p>Назва:</p>
															<input
																type="text"
																name="name"
																value="<?= htmlspecialchars($themeData->name) ?>"
																oninput="updateThemeInfo(event, <?= htmlspecialchars($themeData->themeId) ?>)">
														</label>
													</div>
													<label>
														<p>Опис:</p>
														<textarea
															rows="5"
															name="description"
															oninput="updateThemeInfo(event, <?= htmlspecialchars($themeData->themeId) ?>)"><?= htmlspecialchars($themeData->description) ?></textarea>

													</label>
												</div>
											<?php endforeach; ?>
										<?php endif; ?>
										<button
											class="btn theme-btn"
											id="addThemeBtn<?= htmlspecialchars($moduleData->moduleId) ?>"
											onclick="addTheme(
											event,
											<?= htmlspecialchars($moduleData->moduleId) ?>,
											'addThemeBtn<?= htmlspecialchars($moduleData->moduleId) ?>',
											'themesContainer<?= htmlspecialchars($moduleData->moduleId) ?>'
										)">
											Додати тему
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
						<button
							class="btn module-btn"
							id="addModuleBtn<?= htmlspecialchars($semesterData->id) ?>"
							onclick="addModule(event, <?= htmlspecialchars($semesterData->id) ?>, 'addModuleBtn<?= htmlspecialchars($semesterData->id) ?>', 'modulesContainer<?= htmlspecialchars($semesterData->id) ?>')">
							Додати модуль
						</button>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button id="addNewSemester" class="btn" onclick="addNewSemester(<?= htmlspecialchars($details->id) ?>, <?= htmlspecialchars($educationalForms) ?>)">Додати семестр</button>
</div>