<div>
	<table>
		<tr>
			<th rowspan="2">Вид роботи</th>
			<th rowspan="2">Бал за 1 завдання</th>
			<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php
					$modulesAmount = count($semesterData->modules);
					$semesterColSpan = $modulesAmount;
					?>
					<th colspan="<?= htmlspecialchars($semesterColSpan) ?>">Семестр <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : '' ?>
					<th rowspan="2">Разом</th>
				<?php endforeach; ?>
			<?php endif; ?>
		</tr>
		<tr>
			<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<th>М <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : '' ?></th>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</tr>
		<?php
		$pointsDistribution = isset($pointsDistributionRelatedData->pointsDistribution) ? json_decode($pointsDistributionRelatedData->pointsDistribution, true) : null;
		$practicalPoints = $pointsByTypeOfWork['practicalPoints'];
		$labPoints = $pointsByTypeOfWork['labPoints'];
		$seminarPoints = $pointsByTypeOfWork['seminarPoints'];
		$colloquiumPoints = $pointsByTypeOfWork['colloquiumPoints'];
		$totalByModules = $pointsByTypeOfWork['totalByModules'];
		$totalBySemesters = $pointsByTypeOfWork['totalBySemesters'];
		?>
		<?php if ($structure->isPracticalsExist): ?>
			<tr>
				<td>Виконання практичних завдань</td>
				<td class="table-input-cell">
					<input
						type="number"
						min="0"
						name="practicalPoints"
						value="<?= isset($pointsDistribution['practicalPoints']) ? htmlspecialchars($pointsDistribution['practicalPoints']) : "" ?>"
						oninput="'update'">
				</td>

				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td><?= htmlspecialchars($practicalPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?></td>
							<?php endforeach; ?>
						<?php endif; ?>
						<td><?= htmlspecialchars($practicalPoints['semester' . $semesterData->id . 'Sum']) ?></td>
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
						value="<?= isset($pointsDistribution['labPoints']) ? htmlspecialchars($pointsDistribution['labPoints']) : "" ?>"
						oninput="'update'">
				</td>

				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td><?= htmlspecialchars($labPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?></td>
							<?php endforeach; ?>
						<?php endif; ?>
						<td><?= htmlspecialchars($labPoints['semester' . $semesterData->id . 'Sum']) ?></td>
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
						value="<?= isset($pointsDistribution['seminarPoints']) ? htmlspecialchars($pointsDistribution['seminarPoints']) : "" ?>"
						oninput="'update'">
				</td>

				<?php if (!empty($pointsDistributionRelatedData->semesters)): ?>
					<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
						<?php if (!empty($semesterData->modules)): ?>
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<td><?= htmlspecialchars($seminarPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?></td>
							<?php endforeach; ?>
						<?php endif; ?>
						<td><?= htmlspecialchars($seminarPoints['semester' . $semesterData->id . 'Sum']) ?></td>
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
							<?php foreach ($semesterData->modules as $moduleData): ?>
								<?php if ($moduleData->isColloquiumExists): ?>
									<td class="table-input-cell">
										<input
											type="number"
											min="0"
											name="colloquiumPoints"
											value="<?= htmlspecialchars($colloquiumPoints['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?>"
											oninput="updateModuleInfo(event, <?= htmlspecialchars($moduleData->moduleId) ?>">
									</td>
								<?php else: ?>
									<td>-</td>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						<td><?= htmlspecialchars($colloquiumPoints['semester' . $semesterData->id . 'Sum']) ?></td>
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
							<th><?= htmlspecialchars($totalByModules['semester' . $semesterData->id]['module' . $moduleData->moduleId]) ?></th>
						<?php endforeach; ?>
					<?php endif; ?>
					<th><?= htmlspecialchars($totalByModules['semester' . $semesterData->id . 'Sum']) ?></th>
				<?php endforeach; ?>
			<?php endif; ?>
		</tr>
		<?php
		$semesterWithDifferentialCreditId = 0;
		$semesterWithExamId = 0;

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				if ($semesterData->examType === "диф. залік") {
					$semesterWithDifferentialCreditId = $semesterData->id;
				}
				if ($semesterData->examType === "іспит") {
					$semesterWithExamId = $semesterData->id;
				}
			}
		}
		?>
		<?php if ($semesterWithDifferentialCreditId > 0): ?>
			<tr>
				<td colspan="2">Диф. залік</td>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td>
								</thd>
							<?php endforeach; ?>
						<?php endif; ?>
						<?php if ($semesterWithDifferentialCreditId === $semesterData->id): ?>
							<td>+</td>
						<?php else: ?>
							<td>-</td>
						<?php endif; ?>
					<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<?php if ($semesterWithExamId > 0): ?>
			<tr>
				<td colspan="2">Іспит</td>
				<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if ($semesterWithExamId === $semesterData->id): ?>
						<td class="table-input-cell">
							<input
								type="number"
								min="0"
								name="examPoints"
								value="<?= isset($pointsDistribution['examPoints']) ? htmlspecialchars($pointsDistribution['examPoints']) : "" ?>"
								oninput="'update'">
						</td>
					<?php else: ?>
						<td>-</td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<tr>
			<td colspan="2">Всього</td>
			<?php foreach ($pointsDistributionRelatedData->semesters as $semesterData): ?>
				<?php if (!empty($semesterData->modules)): ?>
					<?php foreach ($semesterData->modules as $moduleData): ?>
						<td></td>
					<?php endforeach; ?>
				<?php endif; ?>
				<th><?= htmlspecialchars($totalBySemesters['semester' . $semesterData->id . 'Sum']) ?></th>
			<?php endforeach; ?>
		</tr>
	</table>
</div>