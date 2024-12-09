<div class="topic-title">
	5. Структура навчальної дисципліни
</div>
<p class="indent">Структура навчальної дисципліни представлена у таблиці 5.1.</p>
<p class="indent">Таблиця 5.1 - Структура навчальної дисципліни</p>
<?php
// Визначаємо початкову ширину колонки "Назви змістових модулів і тем" (у відсотках)
$nameColumnWidth = 100;

// Визначаємо початкову кількість колонок для об'єднання для форм навчання
$hoursColSpan = 0;

// Віднімаємо від ширини колонки "Назви ..." ширину колонок для кількості годин (30%) на кожну форму навчання
foreach ($details->availableEducationalForms as $availableEducationalForm) {
	$nameColumnWidth -= 30;
	// Додаємо колонки для об'єднання в залежності від форм навчання
	$hoursColSpan += 6;
}

// Обраховуємо ширину для запису всіх годин на всі доступні форми навчання 
$hoursColumnWidth = 100 - $nameColumnWidth;
?>
<table>
	<tr>
		<th style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" rowspan="4">Назви змістових модулів і тем</th>
		<th style="width: <?= htmlspecialchars($hoursColumnWidth) ?>%;" colspan="<?= htmlspecialchars($hoursColSpan) ?>">Кількість годин</th>
	</tr>
	<tr>
		<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
			<th class="none-border-left" style="width: 30%;" colspan="6"><?= htmlspecialchars($availableEducationalForm->name) ?></th>
		<?php endforeach; ?>
	</tr>
	<tr>
		<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
			<td class="rotated-total-cell none-border-left" style="width: 5%;" rowspan="2">
				<div>усього</div>
			</td>
			<td class="center" style="width: 25%;" colspan="5">у тому числі</td>
		<?php endforeach; ?>
	</tr>
	<tr>
		<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
			<td style="width: 5%; font-size: 12pt;" class="center none-border-left">лек.</td>
			<td style="width: 5%; font-size: 12pt;" class="center">пр.</td>
			<td style="width: 5%; font-size: 12pt;" class="center">лаб.</td>
			<td style="width: 5%; font-size: 12pt;" class="center">інд.</td>
			<td style="width: 5%; font-size: 12pt;" class="center">с.р.</td>
		<?php endforeach; ?>
	</tr>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semesterData): ?>
			<tr>
				<th colspan="<?= htmlspecialchars($hoursColSpan + 1) ?>" class="inserted">Семестр <?= htmlspecialchars($semesterData->semesterNumber) ?></th>
			</tr>

			<?php if (!empty($semesterData->modules)): ?>
				<?php foreach ($semesterData->modules as $moduleData): ?>
					<tr>
						<th class="inserted" colspan="<?= htmlspecialchars($hoursColSpan + 1) ?>">Модуль <?= htmlspecialchars($moduleData->moduleNumber) ?></th>
					</tr>
					<tr>
						<th colspan="<?= htmlspecialchars($hoursColSpan + 1) ?>" class="inserted"><?= htmlspecialchars($moduleData->moduleName) ?></th>
					</tr>

					<?php if (!empty($moduleData->themes)): ?>
						<?php foreach ($moduleData->themes as $themeData): ?>
							<tr>
								<td style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" class="inserted">Тема <?= $themeData->themeNumber ? htmlspecialchars($themeData->themeNumber) : '' ?>. <?= htmlspecialchars($themeData->name) ?>. <?= htmlspecialchars($themeData->name) ?>.</td>
								<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
									<td class="calculated center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableEducationalForm->colName]->totalHours) ?></td>
									<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableEducationalForm->colName]->lectionHours) ?></td>
									<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableEducationalForm->colName]->practicalHours) ?></td>
									<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableEducationalForm->colName]->labHours) ?></td>
									<td class="center"></td>
									<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableEducationalForm->colName]->selfworkHours) ?></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					<tr>
						<td style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" class="bold">Разом за модулем <span class="inserted"><?= htmlspecialchars($moduleData->moduleNumber) ?></span></td>
						<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
							<td class="calculated center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableEducationalForm->colName]->totalHours) ?></td>
							<td class="calculated center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableEducationalForm->colName]->lectionHours) ?></td>
							<td class="calculated center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableEducationalForm->colName]->practicalHours) ?></td>
							<td class="calculated center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableEducationalForm->colName]->labHours) ?></td>
							<td class="center"></td>
							<td class="calculated center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableEducationalForm->colName]->selfworkHours) ?></td>
						<?php endforeach; ?>
					</tr>

				<?php endforeach; ?>
			<?php endif; ?>
			<tr>
				<td style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" class="inserted bold">Усього за <span class="inserted"><?= htmlspecialchars($semesterData->semesterNumber) ?></span> семестр</td>
				<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
					<td class="calculated center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableEducationalForm->colName]->totalHours) ?></td>
					<td class="calculated center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableEducationalForm->colName]->lectionHours) ?></td>
					<td class="calculated center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableEducationalForm->colName]->practicalHours) ?></td>
					<td class="calculated center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableEducationalForm->colName]->labHours) ?></td>
					<td class="center"></td>
					<td class="calculated center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableEducationalForm->colName]->selfworkHours) ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
</table>