<?php
require_once __DIR__ . '/../../../helpers/getTaskId.php';
require_once __DIR__ . '/../../../helpers/view/getAdditionalTasksGroupedBySemester.php';

$pointsDistributionBySemesters = [];
if (!empty($pointsDistributionRelatedData->semesters)) {
	foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
		$pointsDistributionBySemesters[$semesterData->id] = isset($semesterData->pointsDistribution) ? json_decode($semesterData->pointsDistribution, true) : null;
	}
}

$practicalPoints = $pointsByTypeOfWork['practicalPoints'];
$labPoints = $pointsByTypeOfWork['labPoints'];
$seminarPoints = $pointsByTypeOfWork['seminarPoints'];
$colloquiumPoints = $pointsByTypeOfWork['colloquiumPoints'];
$controlWorkPoints = $pointsByTypeOfWork['controlWorkPoints'];
$calculationAndGraphicPoints = $pointsByTypeOfWork['calculationAndGraphicPoints'];
$totalByModules = $pointsByTypeOfWork['totalByModules'];
$totalBySemesters = $pointsByTypeOfWork['totalBySemesters'];

$semestersWithModulesWithPracticals = $semestersWithModulesWithLessons['semestersWithModulesWithPracticals'];
$semestersWithModulesWithLabs = $semestersWithModulesWithLessons['semestersWithModulesWithLabs'];
$semestersWithModulesWithSeminars = $semestersWithModulesWithLessons['semestersWithModulesWithSeminars'];

$semesterIds = $semestersAndModulesIds['semesterIds'];
$modulesIdsInSemester = $semestersAndModulesIds['modulesIdsInSemester'];

$semesterWithDifferentialCreditIds = $semestersIdsByControlType['semesterWithDifferentialCreditId'];
$semesterWithExamIds = $semestersIdsByControlType['semesterWithExamId'];

$additionalTasks = getAdditionalTasksGroupedBySemester($pointsDistributionRelatedData);

$tasksIds = getTaskId();
?>
<div>
	<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
		<table>
			<tr>
				<th rowspan="2">Вид роботи</th>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<th rowspan="2" class="points-column point-input-column">Бал за 1 завдання (семестр <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?>) </th>
					<?php
					$modulesAmount = count($semesterData->modules);
					$semesterColSpan = $modulesAmount;
					?>
					<th colspan="<?= htmlspecialchars($semesterColSpan) ?>" class="center-text-align">Семестр <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : '' ?>
					<th rowspan="2" class="points-column">Разом</th>
				<?php endforeach; ?>
			</tr>
			<tr>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<th class="points-column">М <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : '' ?></th>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
			<?php if ($structure->isPracticalsExist): ?>
				<tr>
					<td>Виконання практичних завдань</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="table-input-cell">
							<input
								type="number"
								min="0"
								name="practicalPoints"
								id="practicalPoints<?= htmlspecialchars($semesterData->id) ?>"
								value="<?= isset($pointsDistributionBySemesters[$semesterData->id]['practicalPoints']) ? htmlspecialchars($pointsDistributionBySemesters[$semesterData->id]['practicalPoints']) : "" ?>"
								oninput="updateLessonPoints(
									event,
									'practical',
									<?= htmlspecialchars(json_encode($semestersWithModulesWithPracticals[$semesterData->id], JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>,
									<?= htmlspecialchars($semesterData->id) ?>,
									<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
								)">
						</td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td id="practicalModule<?= htmlspecialchars($moduleData->moduleId) ?>" class="center-text-align disabled-cell">
									<?= htmlspecialchars($practicalPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
						<td id="practicalSemester<?= htmlspecialchars($semesterData->id) ?>" class="center-text-align disabled-cell">
							<?= htmlspecialchars($practicalPoints['semester' . $semesterData->id . 'Sum']) ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<?php if ($structure->isLabsExist): ?>
				<tr>
					<td>Виконання лабораторних завдань</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="table-input-cell">
							<input
								type="number"
								min="0"
								name="labPoints"
								id="labPoints<?= htmlspecialchars($semesterData->id) ?>"
								value="<?= isset($pointsDistributionBySemesters[$semesterData->id]['labPoints']) ? htmlspecialchars($pointsDistributionBySemesters[$semesterData->id]['labPoints']) : "" ?>"
								oninput="updateLessonPoints(
									event,
									'lab',
									<?= htmlspecialchars(json_encode($semestersWithModulesWithLabs[$semesterData->id], JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>,
									<?= htmlspecialchars($semesterData->id) ?>,
									<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
								)">
						</td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td id="labModule<?= htmlspecialchars($moduleData->moduleId) ?>" class="center-text-align disabled-cell">
									<?= htmlspecialchars($labPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
						<td id="labSemester<?= htmlspecialchars($semesterData->id) ?>" class="center-text-align disabled-cell">
							<?= htmlspecialchars($labPoints['semester' . $semesterData->id . 'Sum']) ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<?php if ($structure->isSeminarsExist): ?>
				<tr>
					<td>Виконання семінарських завдань</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="table-input-cell">
							<input
								type="number"
								min="0"
								name="seminarPoints"
								id="seminarPoints<?= htmlspecialchars($semesterData->id) ?>"
								value="<?= isset($pointsDistributionBySemesters[$semesterData->id]['seminarPoints']) ? htmlspecialchars($pointsDistributionBySemesters[$semesterData->id]['seminarPoints']) : "" ?>"
								oninput="updateLessonPoints(
									event,
									'seminar',
									<?= htmlspecialchars(json_encode($semestersWithModulesWithSeminars[$semesterData->id], JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>,
									<?= htmlspecialchars($semesterData->id) ?>,
									<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
								)">
						</td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td id="seminarModule<?= htmlspecialchars($moduleData->moduleId) ?>" class="center-text-align disabled-cell">
									<?= htmlspecialchars($seminarPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
						<td id="seminarSemester<?= htmlspecialchars($semesterData->id) ?>" class="center-text-align disabled-cell">
							<?= htmlspecialchars($seminarPoints['semester' . $semesterData->id . 'Sum']) ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<tr>
					<td>Колоквіуми</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="center-text-align disabled-cell"></td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php
							$modulesIds = $modulesIdsInSemester[$semesterData->id];
							?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<?php if ($moduleData->isColloquiumExists): ?>
									<td class="table-input-cell">
										<input
											id="colloquiumModule<?= htmlspecialchars($moduleData->moduleId) ?>"
											type="number"
											min="0"
											name="colloquiumPoints"
											value="<?= htmlspecialchars($colloquiumPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>"
											oninput="updateColloquiumPoints(
												event,
												<?= htmlspecialchars($semesterData->id) ?>,
												<?= htmlspecialchars($moduleData->moduleId) ?>,
												<?= htmlspecialchars($tasksIds->colloquium) ?>,
												<?= json_encode($modulesIds) ?>,
												<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
											)">
									</td>
								<?php else: ?>
									<td class="center-text-align disabled-cell">-</td>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<td id="colloquiumSemester<?= htmlspecialchars($semesterData->id) ?>" class="center-text-align disabled-cell">
							<?= htmlspecialchars($colloquiumPoints['semester' . $semesterData->id . 'Sum']) ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<?php if ($structure->isControlWorkExists): ?>
				<tr>
					<td>Контрольні роботи</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="center-text-align disabled-cell"></td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php
							$modulesIds = $modulesIdsInSemester[$semesterData->id];
							?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<?php if ($moduleData->isControlWorkExists): ?>
									<td class="table-input-cell">
										<input
											id="controlWorkModule<?= htmlspecialchars($moduleData->moduleId) ?>"
											type="number"
											min="0"
											name="controlWorkPoints"
											value="<?= htmlspecialchars($controlWorkPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>"
											oninput="updateControlWorkPoints(
												event,
												<?= htmlspecialchars($semesterData->id) ?>,
												<?= htmlspecialchars($moduleData->moduleId) ?>,
												<?= htmlspecialchars($tasksIds->controlWork) ?>,
												<?= json_encode($modulesIds) ?>,
												<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
											)">
									</td>
								<?php else: ?>
									<td class="center-text-align disabled-cell">-</td>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<td id="controlWorkSemester<?= htmlspecialchars($semesterData->id) ?>" class="center-text-align disabled-cell">
							<?= htmlspecialchars($controlWorkPoints['semester' . $semesterData->id . 'Sum']) ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<?php if ($structure->isCalculationAndGraphicWorkExists || $structure->isCalculationAndGraphicTaskExists): ?>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semester): ?>
					<?php if (isset($semester->calculationAndGraphicTypeTask)): ?>
						<tr>
							<td><?= htmlspecialchars($semester->calculationAndGraphicTypeTask->taskTypeName) ?></td>
							<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
								<td class="center-text-align disabled-cell"></td>
								<?php if (!empty($semesterData->modules)): ?>
									<?php foreach ($semesterData->modules as $moduleData): ?>
										<td class="center-text-align disabled-cell"></td>
									<?php endforeach; ?>
								<?php endif; ?>
								<?php if (!empty($semesterData->id === $semester->calculationAndGraphicTypeTask->semesterId)): ?>
									<td class="table-input-cell">
										<input
											id="calculationAndGraphicTypeTaskSemester<?= htmlspecialchars($semesterData->id) ?>"
											type="number"
											min="0"
											name="calculationAndGraphicTypeTaskPoints<?= htmlspecialchars($semesterData->id) ?>"
											value="<?= htmlspecialchars($semester->calculationAndGraphicTypeTask->points ?? '') ?>"
											oninput="updateTaskPoints(
												event,
												<?= htmlspecialchars($semesterData->id) ?>,
												<?= htmlspecialchars($semester->calculationAndGraphicTypeTask->taskDetailsId) ?>,
												<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
											)">
									</td>
								<?php else: ?>
									<td class="center-text-align disabled-cell">-</td>
								<?php endif; ?>
							<?php endforeach; ?>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if ($structure->isAdditionalTasksExist): ?>
				<?php if (!empty($additionalTasks)): ?>
					<?php foreach ($additionalTasks as $taskTypeName => $additionalTasksByTypeName): ?>
						<tr>
							<?php
							$semesterToAdditionalTaskCorrelation = [];

							foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
								$semesterTask = null;
								foreach ($semesterData->additionalTasks as $additionalTask) {
									if ($additionalTask->taskTypeName === $taskTypeName) {
										$semesterTask = $additionalTask;
									}
								}

								$dataForSemester = (object)[
									"modules" => $semesterData->modules,
									"additionalTask" => $semesterTask,
									"additionalTasks" => $semesterData->additionalTasks
								];

								$semesterToAdditionalTaskCorrelation[$semesterData->id] = $dataForSemester;
							}
							?>
							<td><?= htmlspecialchars(mb_ucfirst($taskTypeName)) ?></td>
							<?php foreach ($semesterToAdditionalTaskCorrelation as $semesterId => $semesterData): ?>
								<td class="center-text-align disabled-cell"></td>
								<?php if (!empty($semesterData->modules)): ?>
									<?php foreach ($semesterData->modules as $moduleData): ?>
										<td class="center-text-align disabled-cell"></td>
									<?php endforeach; ?>
								<?php endif; ?>
								<?php if (isset($semesterData->additionalTask)): ?>
									<td class="table-input-cell">
										<input
											id="additionalTask<?= htmlspecialchars($semesterData->additionalTask->taskDetailsId) ?>"
											type="number"
											min="0"
											name="additionalTaskPoints<?= htmlspecialchars($semesterData->additionalTask->taskDetailsId) ?>"
											value="<?= htmlspecialchars($semesterData->additionalTask->points ?? '') ?>"
											oninput="updateTaskPoints(
													event,
													<?= htmlspecialchars($semesterId) ?>,
													<?= htmlspecialchars($semesterData->additionalTask->taskDetailsId) ?>,
													<?= htmlspecialchars(json_encode($semesterData->additionalTasks, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
												)">
									</td>
								<?php else: ?>
									<td class="center-text-align disabled-cell">-</td>
								<?php endif; ?>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endif; ?>
			<tr>
				<th>Усього за модуль</th>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<td class="center-text-align disabled-cell"></td>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<th id="module<?= htmlspecialchars($moduleData->moduleId) ?>Total" class="center-text-align disabled-cell">
								<?= htmlspecialchars($totalByModules['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>
							</th>
						<?php endforeach; ?>
					<?php endif; ?>
					<th id="semester<?= htmlspecialchars($semesterData->id) ?>Total" class="center-text-align disabled-cell">
						<?= htmlspecialchars($totalByModules['semester' . $semesterData->id . 'Sum']) ?>
					</th>
				<?php endforeach; ?>
			</tr>
			<?php if (!empty($semesterWithDifferentialCreditIds)): ?>
				<tr>
					<td>Диф. залік</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="center-text-align disabled-cell"></td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td class="disabled-cell">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if (in_array($semesterData->id, $semesterWithDifferentialCreditIds)): ?>
							<td class="center-text-align disabled-cell">+</td>
						<?php else: ?>
							<td class="center-text-align disabled-cell">-</td>
						<?php endif; ?>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<?php if (!empty($semesterWithExamIds)): ?>
				<tr>
					<td>Іспит</td>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<td class="center-text-align disabled-cell"></td>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td class="center-text-align disabled-cell"></td>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if (in_array($semesterData->id, $semesterWithExamIds)): ?>
							<td class="table-input-cell">
								<input
									id="examSemester<?= htmlspecialchars($semesterData->id) ?>"
									type="number"
									min="0"
									name="examPoints<?= htmlspecialchars($semesterData->id) ?>"
									value="<?= isset($pointsDistributionBySemesters[$semesterData->id]["examPoints"]) ? htmlspecialchars($pointsDistributionBySemesters[$semesterData->id]["examPoints"]) : "" ?>"
									oninput="updateExamPoints(event, <?= htmlspecialchars($semesterData->id) ?>)">
							</td>
						<?php else: ?>
							<td class="center-text-align disabled-cell">-</td>
						<?php endif; ?>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
			<tr>
				<th>Всього</th>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<td class="center-text-align disabled-cell"></td>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td class="center-text-align disabled-cell"></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<th
						id="fullSemester<?= htmlspecialchars($semesterData->id) ?>Total"
						class="center-text-align disabled-cell <?php if (intval($totalBySemesters['semester' . $semesterData->id . 'Sum']) !== 100): ?>not-valid-bg<?php endif; ?>">
						<?= htmlspecialchars($totalBySemesters['semester' . $semesterData->id . 'Sum']) ?>
					</th>
				<?php endforeach; ?>
			</tr>
		</table>
	<?php else: ?>
		<p>Недостатньо даних, додайте принаймні один семестр.</p>
	<?php endif; ?>
</div>