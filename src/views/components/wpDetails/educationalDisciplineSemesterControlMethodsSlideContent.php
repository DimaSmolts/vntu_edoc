<div id="semestersContainer">
	<?php if (!empty($semesters)): ?>
		<?php foreach ($semesters as $semesterData): ?>
			<!-- Створення контейнера з інформацією про існуючий семестр -->
			<div class="block">
				<div class="semester-title-container">
					<p id="semesterTitle<?= htmlspecialchars($semesterData->semesterId) ?>" class="block-title semester-title">Семестер <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?></p>
				</div>
				<!-- Додавання контейнеру для чекбоксів форм навчання -->
				<div class="educational-forms-container">
					<p class='educational-forms-label'>Форми здобуття освіти:</p>
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
								id="semester<?= htmlspecialchars($semesterData->semesterId) ?><?= htmlspecialchars($educationalForm->colName) ?>Checkbox"
								class="checkbox"
								type="checkbox"
								name="<?= htmlspecialchars($educationalForm->colName) ?>"
								<?= $isChecked ? 'checked' : '' ?>
								onclick="checkTogglingEducationalForm(event, <?= htmlspecialchars($semesterData->semesterId) ?>, <?= htmlspecialchars($educationalForm->id) ?>)">
							<p><?= htmlspecialchars($educationalForm->name) ?></p>
						</label>
					<?php endforeach; ?>
				</div>
				<!-- Додавання контейнеру для індивідуальних завдань -->
				<div class="individual-tasks-container">
					<p class='individual-tasks-label'>Індивідуальні завдання:</p>
					<div class='individual-tasks-block'>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="coursework"
								id="coursework<?= htmlspecialchars($semesterData->semesterId) ?>"
								<?= $semesterData->isCourseworkExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->semesterId) ?>, 'курсову роботу')">
							<p>Курсова робота</p>
						</label>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="courseProject"
								id="courseProject<?= htmlspecialchars($semesterData->semesterId) ?>"
								<?= $semesterData->isCourseProjectExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->semesterId) ?>, 'курсовий проєкт')">
							<p>Курсовий проєкт</p>
						</label>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="calculationAndGraphicWork"
								id="calculationAndGraphicWork<?= htmlspecialchars($semesterData->semesterId) ?>"
								<?= $semesterData->isCalculationAndGraphicWorkExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->semesterId) ?>, 'розрахунково-графічну роботу')">
							<p>Розрахунково-графічна робота (РГР)</p>
						</label>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="calculationAndGraphicTask"
								id="calculationAndGraphicTask<?= htmlspecialchars($semesterData->semesterId) ?>"
								<?= $semesterData->isCalculationAndGraphicTaskExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->semesterId) ?>, 'розрахунково-графічне завдання')">
							<p>Розрахунково-графічне завдання (РГЗ)</p>
						</label>
					</div>
				</div>
				<!-- Додавання контейнеру для інших завдань -->
				<div class="custom-tasks-container">
					<p class='custom-tasks-label'>Інші завдання:</p>
					<div class='custom-tasks-block' id="additionalTaskComponents<?= htmlspecialchars($semesterData->semesterId) ?>">
						<select
							id="additionalTaskIdsSelect<?= htmlspecialchars($semesterData->semesterId) ?>"
							multiple
							<?php if (isset($semesterData->additionalTaskIds)): ?> data-additionalTaskIds=<?= json_encode($semesterData->additionalTaskIds) ?><?php endif; ?>>
						</select>
						<div class="new-task-container">
							<label>Додати власне завдання, якщо його немає в випадаючому списку:</label>
							<input
								type="text"
								name="name"
								id="taskName<?= htmlspecialchars($semesterData->semesterId) ?>">
							<button
								class="btn"
								type="button"
								onclick="createNewAdditionalTasks(<?= htmlspecialchars($semesterData->semesterId) ?>)">
								Додати
							</button>
						</div>
					</div>
				</div>
				<div>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<!-- Додавання контейнеру для типів оцінювання модулів -->
							<div class="module-controls-container">
								<p class='module-controls-label'>Типи оцінювання модуля <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : "" ?>:</p>
								<div class='module-controls-block'>
									<label class="checkbox">
										<input
											class="checkbox"
											type="checkbox"
											name="colloquium"
											<?= $moduleData->isColloquiumExists ? 'checked' : '' ?>
											onclick="checkTogglingModuleTasks(event, <?= htmlspecialchars($moduleData->moduleId) ?>), 'колоквіум'">
										<p>Колоквіум</p>
									</label>
									<label class="checkbox">
										<input
											class="checkbox"
											type="checkbox"
											name="controlWork"
											<?= $moduleData->isControlWorkExists ? 'checked' : '' ?>
											onclick="checkTogglingModuleTasks(event, <?= htmlspecialchars($moduleData->moduleId) ?>), 'контрольну роботу'">
										<p>Контрольна робота</p>
									</label>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>