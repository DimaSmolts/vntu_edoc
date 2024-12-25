<div class="empty"></div>
<div class="topic-title">
	13. Розподіл балів, які отримують студенти
</div>
<p class="indent justify">Оцінювання знань, умінь та навичок здобувачів вищої освіти з окремих видів роботи та в цілому по модулях (в балах):</p>
<!-- <p class="indent justify">13.1 - Оцінювання знань, умінь та навичок з окремих видів роботи та в цілому по модулях (в балах)</p> -->

<?php if (!empty($pointsDistributionSemestersData['semesters'])): ?>
	<?php
	// Визначаємо початкову ширину колонки "Вид роботи" (у відсотках) для таблиць з заняттями
	$activityTypeColumnWidth = 100;
	$moduleColumnWidth = 10;
	$semesterTotalColumnWidth = 10;

	$semestersColumnsWidth = [];
	if (!empty($details->semesters)) {
		foreach ($details->semesters as $semester) {
			if (!empty($semester->modules)) {
				// Збираємо всі дані для семестру (кількість модулів для об'єднання колонок, ширину колонки)
				$semesterColumn = [];

				// Дізнаємось кількість модулів у семестрі
				$semesterColumn['colspan'] = count($semester->modules);

				// Визначаємо ширину колонки семестр (яка об'єднує всі модулі)
				$semesterColumn['width'] = count($semester->modules) * $moduleColumnWidth;

				$semestersColumnsWidth[$semester->id] = $semesterColumn;

				// Віднімаємо ширину колонки семестру та колонки "Разом" для семестру, щоб отримати ширину колонки "Вид роботи"
				$activityTypeColumnWidth -= $semesterColumn['width'] + $semesterTotalColumnWidth;
			}
		}
	}

	$practicalPoints = $pointsDistributionSemestersData['pointsDistribution']['practicalPoints'] ?? 0;
	$labPoints = $pointsDistributionSemestersData['pointsDistribution']['labPoints'] ?? 0;
	$seminarPoints = $pointsDistributionSemestersData['pointsDistribution']['seminarPoints'] ?? 0;
	?>
	<table class="small-bottom-margin">
		<tr>
			<th rowspan="2" style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;">Вид роботи</th>
			<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
				<th
					colspan="<?= htmlspecialchars($semestersColumnsWidth[$semesterData->id]['colspan']) ?>"
					style="width: <?= htmlspecialchars($semestersColumnsWidth[$semesterData->id]['width']) ?>%;">
					Семестр <?= $semesterData->semesterNumber ? htmlspecialchars($semesterData->semesterNumber) : '' ?>
				</th>
				<th rowspan="2" style="width: <?= htmlspecialchars($semesterTotalColumnWidth) ?>%;" class="points-column">Разом</th>
			<?php endforeach; ?>
		</tr>
		<tr>
			<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
				<?php if (!empty($semesterData->modules)): ?>
					<?php foreach ($semesterData->modules as $moduleData): ?>
						<th
							style="width: <?= htmlspecialchars($moduleColumnWidth) ?>%;"
							class="none-border-left">
							М <?= $moduleData->moduleNumber ? htmlspecialchars($moduleData->moduleNumber) : '' ?>
						</th>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</tr>
		<?php if ($structure->isPracticalsExist): ?>
			<tr>
				<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="inserted">Виконання практичних завдань (1 завдання - <?= htmlspecialchars($practicalPoints) ?> б)</td>
				<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td class="center calculated"><?= htmlspecialchars($moduleData->practicalsPoints) ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<td class="center calculated"><?= htmlspecialchars($semesterData->modulesTotal->practicalsPoints) ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<tr>
				<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="inserted">Виконання лабораторних завдань (1 завдання - <?= htmlspecialchars($labPoints) ?> б)</td>
				<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td class="center calculated"><?= htmlspecialchars($moduleData->labsPoints) ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<td class="center calculated"><?= htmlspecialchars($semesterData->modulesTotal->labsPoints) ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<tr>
				<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="inserted">Виконання семінарських завдань (1 завдання - <?= htmlspecialchars($seminarPoints) ?> б)</td>
				<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td class="center calculated"><?= htmlspecialchars($moduleData->seminarsPoints) ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<td class="center calculated"><?= htmlspecialchars($semesterData->modulesTotal->seminarsPoints) ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<?php if ($structure->isColloquiumExists): ?>
			<tr>
				<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="inserted">Колоквіуми</td>
				<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td class="center inserted"><?= htmlspecialchars($moduleData->colloquiumPoints) ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<td class="center calculated"><?= htmlspecialchars($semesterData->modulesTotal->colloquiumPoints) ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<tr>
			<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="bold">Усього за модуль</td>
			<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
				<?php if (!empty($semesterData->modules)): ?>
					<?php foreach ($semesterData->modules as $moduleData): ?>
						<th class="calculated"><?= htmlspecialchars($moduleData->moduleTotal) ?></th>
					<?php endforeach; ?>
				<?php endif; ?>
				<th class="calculated"><?= htmlspecialchars($semesterData->modulesTotal->modulesTotalPoints) ?></th>
			<?php endforeach; ?>
		</tr>
		<?php
		$semesterWithDifferentialCreditIds = $semestersIdsByControlType['semesterWithDifferentialCreditId'];
		$semesterWithExamIds = $semestersIdsByControlType['semesterWithExamId'];
		?>
		<?php if (!empty($semesterWithDifferentialCreditIds)): ?>
			<tr>
				<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="inserted">Диф. залік</td>
				<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if (in_array($semesterData->id, $semesterWithDifferentialCreditIds)): ?>
						<td class="center inserted">+</td>
					<?php else: ?>
						<td class="center inserted">-</td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<?php if (!empty($semesterWithExamIds)): ?>
			<tr>
				<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="inserted">Іспит</td>
				<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
					<?php if (!empty($semesterData->modules)): ?>
						<?php foreach ($semesterData->modules as $moduleData): ?>
							<td></td>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if (in_array($semesterData->id, $semesterWithExamIds)): ?>
						<?php
						$examPoints = $pointsDistributionSemestersData['pointsDistribution']["examPointsSemester$semesterData->id"] ?? 0;
						?>
						<td class="center inserted"><?= htmlspecialchars($examPoints) ?></td>
					<?php else: ?>
						<td class="center inserted">-</td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
		<?php endif; ?>
		<tr>
			<td style="width: <?= htmlspecialchars($activityTypeColumnWidth) ?>%;" class="bold">Всього</td>
			<?php foreach ($pointsDistributionSemestersData['semesters'] as $semesterData): ?>
				<?php if (!empty($semesterData->modules)): ?>
					<?php foreach ($semesterData->modules as $moduleData): ?>
						<td></td>
					<?php endforeach; ?>
				<?php endif; ?>
				<th class="calculated"><?= htmlspecialchars($semesterData->semesterTotal) ?></th>
			<?php endforeach; ?>
		</tr>
	</table>
<?php else: ?>
	<p class="indent">Недостатньо даних для генерації таблиці</p>
<?php endif; ?>

<?php if ($structure->isCourseworkExists): ?>
	<?php
	// $startedNumberOfCourseworkTable = 2;
	?>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semesterData): ?>
			<?php if ($semesterData->isCourseworkExists && $semesterData->courseworkAssessmentComponents): ?>
				<p class="indent justify inserted">Оцінювання знань, умінь та навичок здобувачів вищої освіти за результатами виконання курсового проекту в семестрі <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?> (в балах):</p>
				<!-- <p class="indent justify inserted">13.<?= htmlspecialchars($startedNumberOfCourseworkTable++) ?> - Оцінювання знань, умінь та навичок в балах за результатами виконання курсового проєкту в семестрі <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?> (в балах)</p> -->

				<div class="coursework-table small-bottom-margin">
					<?php
					$courseworkAssessmentComponents = json_decode($semesterData->courseworkAssessmentComponents);
					?>
					<table>
						<tr>
							<th style="width: 70%;">Складові оцінювання</th>
							<th style="width: 30%;">Бали</th>
						</tr>
						<?php
						$totalCourseworkPoints = 0;
						foreach ($courseworkAssessmentComponents as $assesmentComponentName => $points) {
							$totalCourseworkPoints += intval($points);
						}
						?>
						<?php foreach ($courseworkAssessmentComponents as $assesmentComponentName => $points): ?>
							<tr>
								<td style="width: 70%;" class="inserted"><?= htmlspecialchars($assesmentComponentName) ?></td>
								<td style="width: 30%;" class="center inserted"><?= htmlspecialchars($points) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td style="width: 70%;" class="bold">Усього</td>
							<th style="width: 30%;" class="center calculated"><?= htmlspecialchars($totalCourseworkPoints) ?></th>
						</tr>
					</table>
				</div>

			<?php elseif ($semesterData->isCourseworkExists): ?>
				<p class="indent">Оцінювання знань, умінь та навичок здобувачів вищої освіти за результатами виконання курсового проєкту в семестрі <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?> (в балах) відображено в таблиці 13.<?= htmlspecialchars($startedNumberOfCourseworkTable++) ?>.</p>
				<p class="indent">Недостатньо даних для генерації таблиці</p>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endif; ?>

<p class="indent">Шкала оцінювання в балах та ЄКТС:</p>
<!-- <p class="indent">Шкала оцінювання в балах та ЄКТС відображена в таблиці 13.<?= htmlspecialchars($startedNumberOfCourseworkTable) ?>.</p> -->
<!-- <p class="indent">13.<?= htmlspecialchars($startedNumberOfCourseworkTable) ?> - Шкала оцінювання в балах та ЄКТС</p> -->
<table>
	<tr>
		<th style="width: 32%;" class="center">Сума балів за всі види навчальної діяльності</th>
		<th style="width: 68%;" class="center">Оцінка ECTS</th>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">90 - 100</td>
		<td style="width: 68%;" class="center"><span class="bold">A</span></td>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">82 - 89</td>
		<td style="width: 68%;" class="center"><span class="bold">B</span></td>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">75 - 81</td>
		<td style="width: 68%;" class="center"><span class="bold">C</span></td>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">64 - 74</td>
		<td style="width: 68%;" class="center"><span class="bold">D</span></td>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">60 - 63</td>
		<td style="width: 68%;" class="center"><span class="bold">E</span></td>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">35 - 59</td>
		<td style="width: 68%;" class="center"><span class="bold">FX</span><br>незадовільно з можливістю повторного складання</td>
	</tr>
	<tr>
		<td style="width: 32%;" class="center">0 - 34</td>
		<td style="width: 68%;" class="center"><span class="bold">F</span><br>незадовільно з обов’язковим повторним вивченням дисципліни</td>
	</tr>
</table>