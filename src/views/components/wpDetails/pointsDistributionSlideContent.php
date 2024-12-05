<?php
$pointsDistribution = isset($pointsDistributionRelatedData->pointsDistribution) ? json_decode($pointsDistributionRelatedData->pointsDistribution, true) : null;

$practicalPoints = $pointsByTypeOfWork['practicalPoints'];
$labPoints = $pointsByTypeOfWork['labPoints'];
$seminarPoints = $pointsByTypeOfWork['seminarPoints'];
$colloquiumPoints = $pointsByTypeOfWork['colloquiumPoints'];
$totalByModules = $pointsByTypeOfWork['totalByModules'];
$totalBySemesters = $pointsByTypeOfWork['totalBySemesters'];

$semestersWithModulesWithPracticals = $semestersWithModulesWithLessons['semestersWithModulesWithPracticals'];
$semestersWithModulesWithLabs = $semestersWithModulesWithLessons['semestersWithModulesWithLabs'];
$semestersWithModulesWithSeminars = $semestersWithModulesWithLessons['semestersWithModulesWithSeminars'];

$semesterIds = $semestersAndModulesIds['semesterIds'];
$modulesIdsInSemester = $semestersAndModulesIds['modulesIdsInSemester'];

$semesterWithDifferentialCreditIds = $semestersIdsByControlType['semesterWithDifferentialCreditId'];
$semesterWithExamIds = $semestersIdsByControlType['semesterWithExamId'];
?>
<div>
	<table>
		<tr>
			<th rowspan="2">Вид роботи</th>
			<th rowspan="2" class="points-column">Бал за 1 завдання</th>
			<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php
					$modulesAmount = count($semesterData->modules);
					$semesterColSpan = $modulesAmount;
					?>
					<th colspan="<?= htmlspecialchars($semesterColSpan) ?>" class="center-text-align">Семестр <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : '' ?>
					<th rowspan="2" class="points-column">Разом</th>
				<?php endforeach; ?>
			<?php endif; ?>
		</tr>
		<tr>
			<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<th class="points-column">М <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : '' ?></th>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</tr>
		<?php if ($structure->isPracticalsExist): ?>
			<tr>
				<td>Виконання практичних завдань</td>
				<td class="table-input-cell">
					<input
						type="number"
						min="0"
						name="practicalPoints"
						id="practicalPoints"
						value="<?= isset($pointsDistribution['practicalPoints']) ? htmlspecialchars($pointsDistribution['practicalPoints']) : "" ?>"
						oninput="updateLessonPoints(event, 'practical', <?= htmlspecialchars($wpId) ?>, <?= htmlspecialchars(json_encode($semestersWithModulesWithPracticals, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>, <?= json_encode($semesterIds) ?>)">
				</td>

				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
				<?php endif; ?>
			</tr>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<tr>
				<td>Виконання лабораторних завдань</td>
				<td class="table-input-cell">
					<input
						type="number"
						min="0"
						name="labPoints"
						id="labPoints"
						value="<?= isset($pointsDistribution['labPoints']) ? htmlspecialchars($pointsDistribution['labPoints']) : "" ?>"
						oninput="updateLessonPoints(event, 'lab', <?= htmlspecialchars($wpId) ?>, <?= htmlspecialchars(json_encode($semestersWithModulesWithLabs, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>, <?= json_encode($semesterIds) ?>)">
				</td>

				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
				<?php endif; ?>
			</tr>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<tr>
				<td>Виконання семінарських завдань</td>
				<td class="table-input-cell">
					<input
						type="number"
						min="0"
						name="seminarPoints"
						id="seminarPoints"
						value="<?= isset($pointsDistribution['seminarPoints']) ? htmlspecialchars($pointsDistribution['seminarPoints']) : "" ?>"
						oninput="updateLessonPoints(event, 'seminar', <?= htmlspecialchars($wpId) ?>, <?= htmlspecialchars(json_encode($semestersWithModulesWithSeminars, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>, <?= json_encode($semesterIds) ?>)">
				</td>

				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
				<?php endif; ?>
			</tr>
		<?php endif; ?>
		<?php if ($structure->isColloquiumExists): ?>
			<tr>
				<td colspan="2">Колоквіуми</td>
				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
											oninput="updateColloquiumPoints(event, <?= htmlspecialchars($semesterData->id) ?>, <?= htmlspecialchars($moduleData->moduleId) ?>, <?= json_encode($modulesIds) ?>)">
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
				<?php endif; ?>
			</tr>
		<?php endif; ?>
		<tr>
			<th colspan="2">Усього за модуль</th>
			<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
			<?php endif; ?>
		</tr>
		<?php if (!empty($semesterWithDifferentialCreditIds)): ?>
			<tr>
				<td colspan="2">Диф. залік</td>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
				<td colspan="2">Іспит</td>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
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
								value="<?= isset($pointsDistribution["examPointsSemester$semesterData->id"]) ? htmlspecialchars($pointsDistribution["examPointsSemester$semesterData->id"]) : "" ?>"
								oninput="updateExamPoints(event, <?= htmlspecialchars($semesterData->id) ?>, <?= htmlspecialchars($wpId) ?>, <?= json_encode($semesterIds) ?>)">
						</td>
					<?php else: ?>
						<td class="center-text-align disabled-cell">-</td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<tr>
			<th colspan="2">Всього</th>
			<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
				<?php if (!empty($semesterData->modules)): ?>
					<?php foreach ($semesterData->modules as $moduleData): ?>
						<td class="center-text-align disabled-cell"></td>
					<?php endforeach; ?>
				<?php endif; ?>
				<th id="fullSemester<?= htmlspecialchars($semesterData->id) ?>Total" class="center-text-align disabled-cell"><?= htmlspecialchars($totalBySemesters['semester' . $semesterData->id . 'Sum']) ?></th>
			<?php endforeach; ?>
		</tr>
	</table>
</div>