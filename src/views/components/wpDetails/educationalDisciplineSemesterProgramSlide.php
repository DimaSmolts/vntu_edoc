<?php
$title = "Програма навчальної дисципліни";
?>

<?php include __DIR__ . '/../header.php'; ?>

<div id="educationalDisciplineSemesterProgram" class="wp-form">
	<div id="semestersContainer">
		<?php if (!empty($details->semesters)): ?>
			<?php foreach ($details->semesters as $semesterData): ?>
				<!-- Створення контейнера з інформацією про існуючий семестр -->
				<div id="semesterBlock<?= htmlspecialchars($semesterData->id) ?>" class="mini-block">
					<div class="semester-title-container">
						<p id="semesterTitle<?= htmlspecialchars($semesterData->id) ?>" class="mini-block-title semester-title">Семестер <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?></p>
						<button
							class="btn"
							onclick="openApproveDeletingModal('семестр', (event)=>deleteSemester(event, <?= htmlspecialchars($semesterData->id) ?>))">
							Видалити семестр
						</button>
					</div>
					<!-- Створення блоку з даними про існуючий семестр -->
					<div class="semester-data-block">
						<!-- Додавання контейнеру для чекбоксів форм навчання -->
						<div id="educationalFormsContainer" class="educational-forms-container">
							<!-- Додавання чекбоксів для усіх існуючих форм навчання -->
							<?php foreach ($educationalForms as $educationalForm): ?>
								<?php
								$isChecked = false;
								foreach ($semesterData->educationalForms as $form) {
									if ($form->educationalFormId == $educationalForm->id) {
										$isChecked = true;
										break;
									}
								}
								?>
								<label>
									<input
										id="semester<?= htmlspecialchars($semesterData->id) ?><?= htmlspecialchars($educationalForm->colName) ?>Checkbox"
										class="checkbox"
										type="checkbox"
										name="<?= htmlspecialchars($educationalForm->colName) ?>"
										<?= $isChecked ? 'checked' : '' ?>
										onclick="checkTogglingEducationalForm(event, <?= htmlspecialchars($semesterData->id) ?>, <?= htmlspecialchars($educationalForm->id) ?>)">
									<p><?= htmlspecialchars($educationalForm->name) ?></p>
								</label>
							<?php endforeach; ?>
						</div>
						<label>
							<p>Номер семестру:</p>
							<input
								type="number"
								name="semesterNumber"
								value="<?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?>"
								oninput="updateNumberInput(event, <?= htmlspecialchars($semesterData->id) ?>, `semesterTitle<?= htmlspecialchars($semesterData->id) ?>`, 'Семестер', updateSemesterInfo)">
						</label>
						<label>
							<p>Вид контролю:</p>
							<input
								type="text"
								name="examType"
								value="<?= $semesterData->examType ? htmlspecialchars($semesterData->examType) : "" ?>"
								oninput="updateSemesterInfo(event, <?= htmlspecialchars($semesterData->id) ?>)">
						</label>
						<label class="label-with-checkbox">
							<p>Є курсовий</p>
							<input
								class="checkbox"
								type="checkbox"
								name="isCourseworkExists"
								<?= $semesterData->isCourseworkExists ? 'checked' : '' ?>
								onclick="checkTogglingCoursework(event, <?= htmlspecialchars($semesterData->id) ?>)">
						</label>
					</div>
					<div id="modulesContainer<?= htmlspecialchars($semesterData->id) ?>" class="modules-container">
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<div id="moduleBlock<?= htmlspecialchars($moduleData->moduleId) ?>" class="mini-block">
									<div class="module-title-container">
										<p class="mini-block-title module-title" id="moduleTitle<?= htmlspecialchars($moduleData->moduleId) ?>">Mодуль <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : "" ?></p>
										<button
											class="btn"
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
												<div id="themeBlock<?= htmlspecialchars($themeData->themeId) ?>" class="mini-block theme-block">
													<div class="theme-title-container">
														<p class="mini-block-title theme-title" id="themeTitle<?= htmlspecialchars($themeData->themeId) ?>">Тема <?= $themeData->themeNumber ? htmlspecialchars($themeData->themeNumber) : "" ?></p>
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
							class="btn"
							id="addModuleBtn<?= htmlspecialchars($semesterData->id) ?>"
							onclick="addModule(event, <?= htmlspecialchars($semesterData->id) ?>, 'addModuleBtn<?= htmlspecialchars($semesterData->id) ?>', 'modulesContainer<?= htmlspecialchars($semesterData->id) ?>')">
							Додати модуль
						</button>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button id="addNewSemester" class="btn semester-btn" onclick="addNewSemester(<?= htmlspecialchars($details->id) ?>, <?= htmlspecialchars($educationalForms) ?>)">Додати семестр</button>
</div>