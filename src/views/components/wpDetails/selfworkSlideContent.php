<?php
require_once __DIR__ . '/../../../helpers/getLessonTypeIdByName.php';

$lessonTypeIds = getLessonTypeIdByName();
?>
<div>
	<?php if (!empty($selfworkData)): ?>
		<?php foreach ($selfworkData as $semesterSelfworkData): ?>
			<p class="block-title">Самостійна робота до семестру <?= htmlspecialchars($semesterSelfworkData->semesterNumber ?? '') ?>:</p>

			<table class="selfwork-table">
				<tr>
					<th rowspan="2" class="selfwork-number-column">№ з/п</th>
					<th rowspan="2">Вид роботи</th>
					<th rowspan="2">Необхідне навантаження</th>
					<th colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">Кількість годин</th>
				</tr>
				<tr>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<th class="selfwork-educational-forms-column"><?= htmlspecialchars($educationalForm->name) ?></th>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
				<?php
				$sequenceNumber = 2;
				?>
				<tr>
					<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<td rowspan="2">Опрацювання лекційного матеріалу</td>
					<td rowspan="2">не менше 0,25 годин на 1 лекційну годину</td>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<td class="selfwork-educational-forms-column italic">
								лекційних годин: <?= htmlspecialchars($semesterSelfworkData->totalHoursForLections[$educationalForm->colName]) ?>
							</td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
				<tr>
					<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
						<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
							<?php
							$hours = null;
							if (isset($semesterSelfworkData->lectionSelfworkTask->educationalFormHours)) {
								foreach ($semesterSelfworkData->lectionSelfworkTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
									}
								}
							}
							?>
							<td class="selfwork-educational-forms-column table-input-cell">
								<input
									type="number"
									min="0"
									value="<?= htmlspecialchars($hours ?? "") ?>"
									oninput="updateLessonSelfworkHours(
									event,
									<?= htmlspecialchars($lessonTypeIds->lection) ?>,
									<?= htmlspecialchars($educationalForm->id) ?>,
									<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
									)">
							</td>
						<?php endforeach; ?>
					<?php endif; ?>
				</tr>
				<?php if ($semesterSelfworkData->labsAmount > 0): ?>
					<tr>
						<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td rowspan="2">Підготовка до лабораторних занять</td>
						<td rowspan="2">не менше 1 години на 1 тему занять</td>
						<td class="italic" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							лабораторних: <?= htmlspecialchars($semesterSelfworkData->practicalsAmount) ?>
						</td>
					</tr>
					<tr>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								if (isset($semesterSelfworkData->labSelfworkTask->educationalFormHours)) {
									foreach ($semesterSelfworkData->labSelfworkTask->educationalFormHours as $educationalFormHours) {
										if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
											$hours = $educationalFormHours->hours;
										}
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateLessonSelfworkHours(
									event,
									<?= htmlspecialchars($lessonTypeIds->laboratory) ?>,
									<?= htmlspecialchars($educationalForm->id) ?>,
									<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
									)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->practicalsAmount > 0): ?>
					<tr>
						<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td rowspan="2">Підготовка до практичних занять</td>
						<td rowspan="2">не менше 1 години на 1 тему занять</td>
						<td class="italic" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							практичних: <?= htmlspecialchars($semesterSelfworkData->practicalsAmount) ?>
						</td>
					</tr>
					<tr>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								if (isset($semesterSelfworkData->practicalSelfworkTask->educationalFormHours)) {
									foreach ($semesterSelfworkData->practicalSelfworkTask->educationalFormHours as $educationalFormHours) {
										if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
											$hours = $educationalFormHours->hours;
										}
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateLessonSelfworkHours(
									event,
									<?= htmlspecialchars($lessonTypeIds->practical) ?>,
									<?= htmlspecialchars($educationalForm->id) ?>,
									<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
									)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->seminarsAmount > 0): ?>
					<tr>
						<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td rowspan="2">Підготовка до семінарських занять</td>
						<td rowspan="2">не менше 1 години на 1 тему занять</td>
						<td class="italic" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							семінарських: <?= htmlspecialchars($semesterSelfworkData->seminarsAmount) ?>
						</td>
					</tr>
					<tr>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								if (isset($semesterSelfworkData->seminarSelfworkTask->educationalFormHours)) {
									foreach ($semesterSelfworkData->seminarSelfworkTask->educationalFormHours as $educationalFormHours) {
										if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
											$hours = $educationalFormHours->hours;
										}
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateLessonSelfworkHours(
									event,
									<?= htmlspecialchars($lessonTypeIds->seminar) ?>,
									<?= htmlspecialchars($educationalForm->id) ?>,
									<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
									)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<?php if (!empty($semesterSelfworkData->additionalTasks)): ?>
					<?php
					$taskTypeNames = array_map(function ($task) {
						return $task->taskTypeName;
					}, $semesterSelfworkData->additionalTasks);
					?>
					<tr>
						<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td rowspan="2">Написання рефератів / підготовка презентацій / творчих робіт / есеїв / іншого</td>
						<td rowspan="2">5-10 годин на роботу</td>
						<td class="italic" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							Роботи: <?= htmlspecialchars(implode(', ', $taskTypeNames)) ?>
						</td>
					</tr>
					<tr>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								foreach ($semesterSelfworkData->additionalTasks[0]->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateTaskHours(
											event,
											<?= htmlspecialchars($educationalForm->id) ?>,
											<?= htmlspecialchars($semesterSelfworkData->additionalTasks[0]->taskDetailsId) ?>,
											<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
										)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->isCalculationAndGraphicWorkExists): ?>
					<tr>
						<th class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td>Виконання розрахунково-графічної роботи</td>
						<td>10-15 годин на завдання</td>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								foreach ($semesterSelfworkData->calculationAndGraphicTypeTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateTaskHours(
											event,
											<?= htmlspecialchars($educationalForm->id) ?>,
											<?= htmlspecialchars($semesterSelfworkData->calculationAndGraphicTypeTask->taskDetailsId) ?>,
											<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
										)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->isCalculationAndGraphiTaskExists): ?>
					<tr>
						<th class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td>Виконання розрахунково-графічного завдання</td>
						<td>10-15 годин на завдання</td>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								foreach ($semesterSelfworkData->calculationAndGraphicTypeTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateTaskHours(
											event,
											<?= htmlspecialchars($educationalForm->id) ?>,
											<?= htmlspecialchars($semesterSelfworkData->calculationAndGraphicTypeTask->taskDetailsId) ?>,
											<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
										)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->isCourseProjectExists): ?>
					<tr>
						<th class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td>Виконання курсового проєкту</td>
						<td><?= htmlspecialchars($semesterSelfworkData->courseTask->educationalFormHours[0]->hours) ?> годин на один КП</td>
						<td class="center-text-align disabled-cell" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							<?= htmlspecialchars($semesterSelfworkData->courseTask->educationalFormHours[0]->hours) ?>
						</td>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->isCourseworkExists): ?>
					<tr>
						<th class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td>Виконання курсової роботи</td>
						<td><?= htmlspecialchars($semesterSelfworkData->courseTask->educationalFormHours[0]->hours) ?> годин на одну КР</td>
						<td class="center-text-align disabled-cell" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							<?= htmlspecialchars($semesterSelfworkData->courseTask->educationalFormHours[0]->hours) ?>
						</td>
					</tr>
				<?php endif; ?>
				<?php if ($semesterSelfworkData->colloquiumAmount > 0 || $semesterSelfworkData->controlWorkAmount > 0): ?>
					<tr>
						<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
						<td rowspan="2">Підготовка до модульного контролю</td>
						<td rowspan="2">2-5 годин на захід</td>
						<td class="italic" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
							<?php if ($semesterSelfworkData->colloquiumAmount > 0): ?>
								колоквіуми: <?= htmlspecialchars($semesterSelfworkData->colloquiumAmount) ?><br>
							<?php endif; ?>
							<?php if ($semesterSelfworkData->controlWorkAmount > 0): ?>
								контрольні роботи: <?= htmlspecialchars($semesterSelfworkData->controlWorkAmount) ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<?php if (!empty($semesterSelfworkData->educationalForms)): ?>
							<?php foreach ($semesterSelfworkData->educationalForms as $educationalForm): ?>
								<?php
								$hours = null;
								foreach ($semesterSelfworkData->moduleTask->educationalFormHours as $educationalFormHours) {
									if ($educationalFormHours->educationalFormName === $educationalForm->colName) {
										$hours = $educationalFormHours->hours;
									}
								}
								?>
								<td class="selfwork-educational-forms-column table-input-cell">
									<input
										type="number"
										min="0"
										value="<?= htmlspecialchars($hours ?? "") ?>"
										oninput="updateTaskHours(
											event,
											<?= htmlspecialchars($educationalForm->id) ?>,
											<?= htmlspecialchars($semesterSelfworkData->moduleTask->taskDetailsId) ?>,
											<?= htmlspecialchars($semesterSelfworkData->semesterId) ?>
										)">
								</td>
							<?php endforeach; ?>
						<?php endif; ?>
					</tr>
				<?php endif; ?>
				<tr>
					<th rowspan="2" class="selfwork-number-column"><?= htmlspecialchars($sequenceNumber++) ?></th>
					<?php if ($semesterSelfworkData->examTypeId === 0): ?>
						<td rowspan="2">Підготовка до складання іспиту</td>
						<td rowspan="2">іспит – 3 години на кредит ЄКТС</td>
					<?php elseif ($semesterSelfworkData->examTypeId === 1): ?>
						<td rowspan="2">Підготовка до складання заліку</td>
						<td rowspan="2">залік – 1 година на кредит ЄКТС</td>
					<?php elseif ($semesterSelfworkData->examTypeId === 2): ?>
						<td rowspan="2">Підготовка до складання диф. заліку</td>
						<td rowspan="2">диф. залік – 1 година на кредит ЄКТС</td>
					<?php endif; ?>
					<td class="center-text-align" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
						Кредити: <?= htmlspecialchars($semesterSelfworkData->creditsAmount) ?>
					</td>
				</tr>
				<tr>
					<td class="center-text-align disabled-cell" colspan="<?= htmlspecialchars(count($semesterSelfworkData->educationalForms)) ?>">
						<?php if ($semesterSelfworkData->examTypeId === 0): ?>
							<?= htmlspecialchars($semesterSelfworkData->creditsAmount * 3) ?>
						<?php else: ?>
							<?= htmlspecialchars($semesterSelfworkData->creditsAmount) ?>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		<?php endforeach; ?>
	<?php endif; ?>
</div>