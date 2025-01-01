<div class="empty"></div>
<div class="topic-title">
	9. Самостійна робота
</div>

<?php if (!empty($selfworkData)): ?>
	<?php foreach ($selfworkData as $semesterSelfworkData): ?>
		<?php
		// Визначаємо початкову ширину колонки "Вид роботи" (у відсотках) для таблиць з заняттями
		$typeOfWorkColumnWidth = 95; // 5% для колонки з номером за порядком
		$fullHoursAmountColumnWidth = 0;

		// Збираємо загальні значення
		$total = [];

		// Віднімаємо від ширини колонки "Назва ..." ширину колонок для кількості годин (13%) на кожну форму навчання
		foreach ($semesterSelfworkData->educationalForms as $educationalForm) {
			$typeOfWorkColumnWidth -= 13;
			$fullHoursAmountColumnWidth += 13;
			$total[$educationalForm->colName] = 0;
		}

		?>
		<p class="indent">Самостійна робота до семестру <span class="inserted"><?= htmlspecialchars($semesterSelfworkData->semesterNumber ?? '') ?></span>:</p>

		<table class="mini-bottom-margin">
			<tr>
				<th rowspan="2" style="width: 5%;">№ з/п</th>
				<th rowspan="2" style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Вид роботи</th>
				<th
					colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>"
					style="width: <?= htmlspecialchars($fullHoursAmountColumnWidth) ?>%;">
					Кількість годин
				</th>
			</tr>
			<tr>
				<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
					<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
						<th style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($educationalForm->name) ?></th>
					<?php endforeach; ?>
				<?php endif; ?>
			</tr>

			<?php
			$sequenceNumber = 2;
			?>

			<tr>
				<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
				<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
					Опрацювання лекційного матеріалу
				</td>
				<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
					<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
						<?php
						$hours = null;
						if (isset($semesterSelfworkData->lectionSelfworkTask->educationalFormHours)) {
							foreach ($semesterSelfworkData->lectionSelfworkTask->educationalFormHours as $educationalFormHours) {
								if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
									$hours = $educationalFormHours->hours;
									$total[$educationalForm->colName] += $hours;
								}
							}
						}
						?>
						<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
					<?php endforeach; ?>
				<?php endif; ?>
			</tr>

			<?php if ($semesterSelfworkData->labsAmount > 0): ?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
						Підготовка до лабораторних занять
					</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							if (isset($semesterSelfworkData->labSelfworkTask->educationalFormHours)) {
								foreach ($semesterSelfworkData->labSelfworkTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
										$total[$educationalForm->colName] += $hours;
									}
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<?php if ($semesterSelfworkData->practicalsAmount > 0): ?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
						Підготовка до практичних занять
					</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							if (isset($semesterSelfworkData->practicalSelfworkTask->educationalFormHours)) {
								foreach ($semesterSelfworkData->practicalSelfworkTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
										$total[$educationalForm->colName] += $hours;
									}
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<?php if ($semesterSelfworkData->seminarsAmount > 0): ?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
						Підготовка до семінарських занять
					</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							if (isset($semesterSelfworkData->seminarSelfworkTask->educationalFormHours)) {
								foreach ($semesterSelfworkData->seminarSelfworkTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
										$total[$educationalForm->colName] += $hours;
									}
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<?php if (!empty($semesterSelfworkData->additionalTasks)): ?>
				<?php
				$taskTypeNames = array_map(function ($task) {
					return mb_strtolower($task->taskTypeName);
				}, $semesterSelfworkData->additionalTasks);
				?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
						Написання/виконання: <?= htmlspecialchars(implode(', ', $taskTypeNames)) ?>
					</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							foreach ($semesterSelfworkData->additionalTasks[0]->educationalFormHours as $educationalFormHours) {
								if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
									$hours = $educationalFormHours->hours;
									$total[$educationalForm->colName] += $hours;
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<?php if ($semesterSelfworkData->isCalculationAndGraphicWorkExists): ?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
						Виконання розрахунково-графічної роботи
					</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							foreach ($semesterSelfworkData->calculationAndGraphicTypeTask->educationalFormHours as $educationalFormHours) {
								if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
									$hours = $educationalFormHours->hours;
									$total[$educationalForm->colName] += $hours;
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<?php if ($semesterSelfworkData->isCalculationAndGraphiTaskExists): ?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">
						Виконання розрахунково-графічного завдання
					</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							foreach ($semesterSelfworkData->calculationAndGraphicTypeTask->educationalFormHours as $educationalFormHours) {
								if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
									$hours = $educationalFormHours->hours;
									$total[$educationalForm->colName] += $hours;
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<?php if ($semesterSelfworkData->isCourseProjectExists): ?>
				<?php
				if (!empty($semesterSelfworkData->educationalForms)) {
					foreach ($semesterSelfworkData->educationalForms as $educationalForm) {
						$total[$educationalForm->colName] += $semesterSelfworkData->courseTask->educationalFormHours[0]->hours;
					}
				}
				?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Виконання курсового проєкту</td>
					<td
						colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>"
						style="width: 13%;"
						class="none-border-left center inserted">
						<?= htmlspecialchars($semesterSelfworkData->courseTask->educationalFormHours[0]->hours) ?>
					</td>
				</tr>
			<?php endif; ?>
			<?php if ($semesterSelfworkData->isCourseworkExists): ?>
				<?php
				if (!empty($semesterSelfworkData->educationalForms)) {
					foreach ($semesterSelfworkData->educationalForms as $educationalForm) {
						$total[$educationalForm->colName] += $semesterSelfworkData->courseTask->educationalFormHours[0]->hours;
					}
				}
				?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Виконання курсової роботи</td>
					<td
						colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>"
						style="width: <?= htmlspecialchars($fullHoursAmountColumnWidth) ?>%;"
						class="none-border-left center inserted">
						<?= htmlspecialchars($semesterSelfworkData->courseTask->educationalFormHours[0]->hours) ?>
					</td>
				</tr>
			<?php endif; ?>

			<?php if ($semesterSelfworkData->colloquiumAmount > 0 || $semesterSelfworkData->controlWorkAmount > 0): ?>
				<tr>
					<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Підготовка до модульного контролю</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							foreach ($semesterSelfworkData->moduleTask->educationalFormHours as $educationalFormHours) {
								if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
									$hours = $educationalFormHours->hours;
									$total[$educationalForm->colName] += $hours;
								}
							}
							?>
							<td style="width: 13%;" class="none-border-left center inserted"><?= htmlspecialchars($hours ?? '') ?></td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<tr>
				<th style="width: 5%;"><?= htmlspecialchars($sequenceNumber++) ?></th>
				<?php if ($semesterSelfworkData->examTypeId === 0): ?>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Підготовка до складання іспиту</td>
				<?php elseif ($semesterSelfworkData->examTypeId === 1): ?>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Підготовка до складання заліку</td>
				<?php elseif ($semesterSelfworkData->examTypeId === 2): ?>
					<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;">Підготовка до складання диф. заліку</td>
				<?php endif; ?>
				<?php
				$hours = 0;
				if ($semesterSelfworkData->examTypeId === 0) {
					$hours = $semesterSelfworkData->creditsAmount * 3;
				} else {
					$hours = $semesterSelfworkData->creditsAmount;
				}

				if (!empty($semesterSelfworkData->educationalForms)) {
					foreach ($semesterSelfworkData->educationalForms as $educationalForm) {
						$total[$educationalForm->colName] += $hours;
					}
				}
				?>
				<td
					colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>"
					style="width: <?= htmlspecialchars($fullHoursAmountColumnWidth) ?>%;"
					class="none-border-left center calculated">
					<?= htmlspecialchars($hours) ?>
				</td>
			</tr>

			<tr>
				<th style="width: 5%;"></th>
				<td style="width: <?= htmlspecialchars($typeOfWorkColumnWidth) ?>%;" class="bold">Всього</td>
				<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
					<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
						<th
							style="width: 13%;"
							class="none-border-left center calculated">
							<?= htmlspecialchars($total[$educationalForm->colName] ?? '0') ?>
						</th>
					<?php endforeach; ?>
				<?php endif; ?>
			</tr>
		</table>
	<?php endforeach; ?>
<?php else: ?>
	<p class="indent justify">Недостатньо даних для формування таблиць</p>
<?php endif; ?>