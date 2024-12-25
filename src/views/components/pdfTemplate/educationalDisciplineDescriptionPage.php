<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<page_footer>
		<div class="center" style="position: absolute; bottom: 10mm; width: 100%;">
			[[page_cu]]
		</div>
	</page_footer>

	<div class="topic-title-page-start">1. Опис навчальної дисципліни</div>
	<?php
	$wpDescriptionColumnWidth = 100; // Початкову ширину колонкок "Найменування показників" та "Галузь знань, спец..." (у відсотках)
	$wpCharacteristicsPartColumnWidth = 13; // Ширина для однієї форми навчання одного семестру
	$wpCharacteristicsColumnWidth = 0; // Початкова ширина колонки "Характеристика навчальної дисципліни"

	// Зберігаємо всі значення ширини для кожної форми навчання в залежності від кількості семестрів для форми навчання
	$columnWidthByEducationalForm = [];
	// Зберігаємо всі семестри кожної форми навчання
	$semestersByEducationalForm = [];

	// Визначаємо ключ - форма навчання (перебираємо всі доступні в робочій програмі)
	foreach ($details->availableEducationalForms as $availableEducationalForm) {
		$columnWidthByEducationalForm[$availableEducationalForm->colName] = 0;
		$semestersByEducationalForm[$availableEducationalForm->colName] = [];
	}

	foreach ($details->semesters as $semester) {
		if (!empty($semester->educationalForms)) {
			foreach ($semester->educationalForms as $educationalForm) {
				// Визначаємо значення (додаємо ширину для кожної форми навчання кожного семестру)
				$columnWidthByEducationalForm[$educationalForm->colName] = $wpCharacteristicsPartColumnWidth;
				// Визначаємо значення (додаємо семестр для кожної форми навчання)
				$semestersByEducationalForm[$educationalForm->colName] = array_merge($semestersByEducationalForm[$educationalForm->colName], [$semester]);
				// Додаємо ширину до колонки "Характеристика навчальної дисципліни"
				$wpCharacteristicsColumnWidth += $wpCharacteristicsPartColumnWidth;
			}
		}
	}

	// Зберігаємо кількість навчальних форм та семестрів
	$amountOfEducationalFormsAndSemesters = 0;

	foreach ($semestersByEducationalForm as $ef) {
		foreach ($ef as $semester) {
			$amountOfEducationalFormsAndSemesters += 1;
		}
	}

	$wpDescriptionColumnWidth -= $wpCharacteristicsColumnWidth;

	$indicatorsColumnWidth = 20; // ширина колонки "Найменування показників"
	$descColumnWidth = $wpDescriptionColumnWidth - 20; // ширина колонки "Галузь знань, спец..."
	?>
	<table class="small-bottom-margin">
		<tr>
			<th style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" rowspan="2" colspan="2">
				Найменування показників
			</th>
			<th style="width: <?= htmlspecialchars($descColumnWidth) ?>%" rowspan="2">
				Галузь знань, спеціальність, освітні програми, рівень вищої освіти
			</th>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<?php if ($amountOfEducationalFormsAndSemesters === 1): ?>
					Характе-<br>ристика навчаль-<br>ної дис-<br>ципліни
				<?php else: ?>
					Характеристика навчальної дисципліни
				<?php endif; ?>
			</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<th
					class="none-border-left"
					style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;"
					colspan="<?= htmlspecialchars(count($semestersByEducationalForm[$availableEducationalForm->colName])) ?>">
					<?= htmlspecialchars($availableEducationalForm->name) ?> форма
				</th>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2">
				Кількість кредитів<br><span class="inserted"><?= htmlspecialchars($details->creditsAmount) ?></span>
			</td>
			<td style="width: <?= htmlspecialchars($descColumnWidth) ?>%" class="inserted center" rowspan="3">
				<b>Галузь знань</b><br>
				<?= htmlspecialchars($details->fielfOfStudyName) ?>
			</td>
			<td style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<span class="change">Обов'язкова (професійна чи загальна)</span>
			</td>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2" rowspan="2">
				Модулів<br><span class="calculated"><?= htmlspecialchars($details->modulesInWorkingProgramAmount) ?></span>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<?php if ($amountOfEducationalFormsAndSemesters === 1): ?>
					Рік підготов-<br>ки (курс)
				<?php else: ?>
					Рік підготовки (курс)
				<?php endif; ?>
			</th>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="inserted none-border-left center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<?= isset($details->academicYear) ? htmlspecialchars($details->academicYear) : '' ?>
			</td>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2" rowspan="2">
				Змістових модулів<br><span class="calculated"><?= htmlspecialchars($details->modulesInWorkingProgramAmount) ?></span>
			</td>
			<td style="width: <?= htmlspecialchars($descColumnWidth) ?>%" class="inserted center" rowspan="5">
				<b>Cпеціальність</b><br>
				<?php if (!empty($details->specialties)): ?>
					<?php foreach ($details->specialties as $specialty): ?>
						<?= htmlspecialchars($specialty->code) ?> <?= htmlspecialchars($specialty->name) ?><br>
					<?php endforeach; ?>
				<?php else: ?>
					-
				<?php endif; ?>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<p>Семестр</p>
			</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->semesterNumber ?? '-') ?><br>
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2" rowspan="3">
				Індивідуальне завдання<br><span class="change">-</span>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Лекції</th>
		</tr>
		<tr><?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->totalHoursForLections[$availableEducationalForm->colName]) ?> год.
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<?php if ($amountOfEducationalFormsAndSemesters === 1): ?>
					Практи-<br>чні
				<?php else: ?>
					Практичні
				<?php endif; ?>
			</th>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2" rowspan="2">
				Загальна кількість годин<br><span class="change">150</span>
			</td>
			<td style="width: <?= htmlspecialchars($descColumnWidth) ?>%" class="inserted center" rowspan="7">
				<b>Освітня програма</b><br>
				<?php if (!empty($details->educationalPrograms)): ?>
					<?php foreach ($details->educationalPrograms as $educationalProgram): ?>
						<span class="inserted"><?= htmlspecialchars($educationalProgram->name) ?></span>
					<?php endforeach; ?>
				<?php else: ?>
					-
				<?php endif; ?>
			</td>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->totalHoursForPracticals[$availableEducationalForm->colName]) ?> год.
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<?php if ($amountOfEducationalFormsAndSemesters === 1): ?>
					Семінар-<br>ські
				<?php else: ?>
					Семінарські
				<?php endif; ?>
			</th>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2" rowspan="5">
				Тижневих годин для денної форми навчання
			</td>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->totalHoursForSeminars[$availableEducationalForm->colName]) ?> год.
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<?php if ($amountOfEducationalFormsAndSemesters === 1): ?>
					Лабора-<br>торні
				<?php else: ?>
					Лабораторні
				<?php endif; ?>
			</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->totalHoursForLabs[$availableEducationalForm->colName]) ?> год.
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Курсовий проєкт (робота)</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						-
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td class="center" rowspan="2" style="width: <?= htmlspecialchars($indicatorsColumnWidth / 2) ?>%;">ауд.</td>
			<td class="center" rowspan="2" style="width: <?= htmlspecialchars($indicatorsColumnWidth / 2) ?>%;">сам. роб.</td>
			<td style="width: <?= htmlspecialchars($descColumnWidth) ?>%" class="inserted center" rowspan="4">
				<b>Рівень вищої освіти</b><br><span class="inserted"><?= htmlspecialchars($details->stydingLevelId) ?></span>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Самостійна робота</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="change center none-border-left">
						пусто
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td class="center change" rowspan="2" style="width: <?= htmlspecialchars($indicatorsColumnWidth / 2) ?>%;">6</td>
			<td class="center change" rowspan="2" style="width: <?= htmlspecialchars($indicatorsColumnWidth / 2) ?>%;">4</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Вид контролю</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->examTypeId ?? '') ?>
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
	</table>

	<div class="bold">Примітка:</div>
	<?= $details->notes ?>
</page>