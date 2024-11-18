<?php
$title = "Програма навчальної дисципліни";
?>

<?php include __DIR__ . '/../header.php'; ?>

<div id="educationalDisciplineSemesterProgram" class="wp-form">
	<div id="semestersContainer">
		<?php if (!empty($semestersData)): ?>
			<?php foreach ($semestersData as $semesterData): ?>
				<p id="semesterTitle<?= htmlspecialchars($semesterData->id) ?>" class=" mini-block-title">Семестер <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?></p>
				<div class="semester-data-block">
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
							value="<?= htmlspecialchars($semesterData->examType) ?>"
							oninput="updateSemesterInfo(event, <?= htmlspecialchars($semesterData->id) ?>)">
					</label>
				</div>
				<div id="modulesContainer<?= htmlspecialchars($semesterData->id) ?>" class="modules-container">
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<div class="mini-block">
								<div class="module-title-container">
									<p class="mini-block-title module-title" id="moduleTitle<?= htmlspecialchars($moduleData->moduleId) ?>">Mодуль <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : "" ?></p>
									<button class="btn">Видалити модуль</button>
								</div>
								<div class="module-data-block">
									<label>
										<p>Номер модуля:</p>
										<input
											type="number"
											name="moduleNumber"
											value="<?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : "" ?>"
											oninput="updateModuleInfo(event, <?= htmlspecialchars($moduleData->moduleId) ?>)">
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
														onclick="removeTheme(event, <?= htmlspecialchars($themeData->themeId) ?>)">
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
															oninput="updateThemeInfo(event, <?= htmlspecialchars($themeData->themeId) ?>)">
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
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button id="addNewSemester" class="btn semester-btn" onclick="addNewSemecter(<?= htmlspecialchars($details->id) ?>)">Додати семестр</button>
</div>