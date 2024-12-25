<div id="semestersContainer">
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semesterData): ?>
			<!-- Створення контейнера з інформацією про існуючий семестр -->
			<div class="block">
				<div class="semester-title-container">
					<p id="semesterTitle<?= htmlspecialchars($semesterData->id) ?>" class="block-title semester-title">Семестер <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : "" ?></p>
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
				<!-- Додавання контейнеру для індивідуальних завдань -->
				<div class="individual-tasks-container">
					<p class='individual-tasks-label'>Індивідуальні завдання:</p>
					<div class='individual-tasks-block'>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="isCourseworkExists"
								<?= $semesterData->isCourseworkExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->id) ?>, 'курсову роботу')">
							<p>Курсова робота</p>
						</label>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="isCourseProjectExists"
								<?= $semesterData->isCourseProjectExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->id) ?>, 'курсовий проєкт')">
							<p>Курсовий проєкт</p>
						</label>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="isCalculationAndGraphicWorkExists"
								<?= $semesterData->isCalculationAndGraphicWorkExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->id) ?>, 'розрахунково-графічну роботу')">
							<p>Розрахунково-графічна робота (РГР)</p>
						</label>
						<label class="checkbox">
							<input
								class="checkbox"
								type="checkbox"
								name="isCalculationAndGraphicTaskExists"
								<?= $semesterData->isCalculationAndGraphicTaskExists ? 'checked' : '' ?>
								onclick="checkTogglingIndividualTask(event, <?= htmlspecialchars($semesterData->id) ?>, 'розрахунково-графічне завдання')">
							<p>Розрахунково-графічне завдання (РГЗ)</p>
						</label>
					</div>
				</div>
				<!-- Додавання контейнеру для інших завдань -->
				<div class="custom-tasks-container">
					<p class='custom-tasks-label'>Інші завдання:</p>
					<div class='custom-tasks-block' id="additionalTaskComponents<?= htmlspecialchars($semesterData->id) ?>">
						<?php if (isset($semesterData->additionalTasks)): ?>
							<?php
							$additionalTasksComponents = json_decode($semesterData->additionalTasks, true)
							?>
							<?php foreach ($additionalTasksComponents as $name): ?>
								<div class="additional-task-components-inputs">
									<input
										type="text"
										name="additionalTaskName"
										value="<?= htmlspecialchars($name ?? '') ?>"
										oninput="updateAdditionalTasks(event, <?= htmlspecialchars($semesterData->id) ?>)">
									<button
										class="btn"
										onclick="removeAdditionalTaskInputs(event, <?= htmlspecialchars($semesterData->id) ?>)">
										Видалити
									</button>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="additional-task-components-inputs">
								<input
									type="text"
									name="additionalTaskName"
									oninput="updateAdditionalTasks(event, <?= htmlspecialchars($semesterData->id) ?>)">
								<button
									class="btn"
									onclick="removeAdditionalTaskInputs(event)">
									Видалити
								</button>
							</div>
						<?php endif; ?>
						<button
							class="btn"
							id="addAdditionalTask<?= htmlspecialchars($semesterData->id) ?>"
							onclick="addAdditionalTaskInputs(event, <?= htmlspecialchars($semesterData->id) ?>)">
							Додати завдання
						</button>
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
											name="isColloquiumExists"
											<?= $moduleData->isColloquiumExists ? 'checked' : '' ?>
											onclick="checkTogglingColloquium(event, <?= htmlspecialchars($moduleData->moduleId) ?>)">
										<p>Колоквіум</p>
									</label>
									<label class="checkbox">
										<input
											class="checkbox"
											type="checkbox"
											name="isControlWorkExists"
											<?= $moduleData->isControlWorkExists ? 'checked' : '' ?>
											onclick="checkTogglingControlWork(event, <?= htmlspecialchars($moduleData->moduleId) ?>)">
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