<page backtop="20mm" backbottom="25mm" backleft="25mm" backright="10mm">
	<div class="center global"><?= htmlspecialchars($details->globalData->universityName) ?></div>
	<div class="center inserted"><?= isset($details->facultyId) ? htmlspecialchars($details->faculty->name) : '' ?></div>
	<div class="center inserted small-bottom-margin"><?= isset($details->departmentId) ? htmlspecialchars($details->department->name) : '' ?></div>
	<div class="right ">ЗАТВЕРДЖУЮ</div>
	<div class="approved-position-container change">
		<div class="right approved-position">Проректор з науково-педагогічної роботи та організації освітнього процесу</div>
	</div>
	<div class="right">__________ <span class="change">Олександр ПЕТРОВ</span></div>
	<div class="right">"___"____________ <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> року</div>
	<div class="center">
		<img src="src/images/logo.png" style="width: 60mm" alt="logo">
	</div>

	<div class="center">РОБОЧА ПРОГРАМА НАВЧАЛЬНОЇ ДИСЦИПЛІНИ</div>
	<div class="center inserted uppercase bold"><?= htmlspecialchars($details->disciplineName) ?></div>
	<div class="center title-placeholder small-bottom-margin">(шифр і назва навчальної дисципліни)</div>

	<div class="basic-info">
		<b class="basic-info-name">рівень вищої освіти</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->degreeId) ?></u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">галузь знань</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->fielfOfStudyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">спеціальність</b>: <u class="basic-info-value"><span class="not-inserted">
				<?= htmlspecialchars($details->specialtyIds) ?>
			</span> – <span class="inserted">
				<?= htmlspecialchars($details->specialtyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info small-bottom-margin">
		<b class="basic-info-name">освітня програма</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->educationalProgram) ?></u>
	</div>
	<div class="center inserted large-bottom-margin bold"><?= htmlspecialchars($details->code) ?></div>
	<div class="center"><span class="global"><?= htmlspecialchars($details->globalData->universityShortName) ?></span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span></div>
</page>

<page backtop="20mm" backbottom="25mm" backleft="25mm" backright="10mm">
	<div class="topic-title-page-start">
		Робоча програма навчальної дисципліни <span class="inserted"><?= htmlspecialchars($details->disciplineName) ?></span>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">рівень вищої освіти</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->degreeId) ?></u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">галузь знань</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->fielfOfStudyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">спеціальність</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->specialtyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">освітня програма</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->educationalProgram) ?></u>
	</div>
	<div class="basic-info">
		<span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> – <span class="change"> 14 c.</span>
	</div>

	<table class="approved-table">
		<tr>
			<th class="approved-first-col"></th>
			<th class="approved-second-col">Посада<br>Протокол засідання</th>
			<th class="approved-third-col">ПІБ</th>
			<th class="approved-forth-col">Підпис</th>
		</tr>
		<tr>
			<td class="approved-first-col">Розроблено</td>
			<td class="approved-second-col change">Професор кафедри АІІТ</td>
			<?php if (isset($details->createdByPersons[0])): ?>
				<td class="approved-third-col inserted"><?= htmlspecialchars($details->createdByPersons[0]->degree) ?>, <?= htmlspecialchars($details->createdByPersons[0]->name) ?> <?= htmlspecialchars($details->createdByPersons[0]->surname) ?></td>
			<?php else: ?>
				<td class="approved-third-col inserted"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td rowspan="3" class="approved-first-col">Схвалено</td>
			<td class="approved-second-col change">Гарант освітньої програми</td>
			<td class="approved-third-col change">к.т.н., доцент Володимир СЕВАСТЬЯНОВ</td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-second-col change none-border-left">Зав. кафедри АІІТ<br>
				Засідання кафедри АІІТ<br>
				(протокол № 1 від 13.08.2024 р.)
			</td>
			<td class="approved-third-col change">д.т.н., професор Олег БІСІКАЛО</td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-second-col change none-border-left">Голова вченої ради ФІІТА<br>
				Вчена рада ФІІТА<br>
				(протокол № 1 від 19.08.2024 р.)</td>
			<td class="approved-third-col change">к.т.н., доцент Володимир СЕВАСТЬЯНОВ</td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-first-col">Затверджено</td>
			<td class="approved-second-col change">Голова Ради з якості освіти<br>
				Рада з якості освіти ВНТУ<br>
				(протокол № _ від ___ 2024 р.)</td>
			<td class="approved-third-col change">к.т.н., доцент Олександр ПЕТРОВ</td>
			<td class="approved-forth-col"></td>
		</tr>
	</table>

	<?php
	$copyrightPersonNameLetter = "";
	$copyrightPersonPatronymicNameLetter = "";

	if (isset($details->createdByPersons[0])) {
		$copyrightPersonNameLetter = mb_substr($details->createdByPersons[0]->name, 0, 1);
		$copyrightPersonPatronymicNameLetter = mb_substr($details->createdByPersons[0]->patronymicName, 0, 1);
	}
	?>
	<?php if (isset($details->createdByPersons[0])): ?>
		<div class="copyright copyright-name">© <span class="inserted"><?= htmlspecialchars($copyrightPersonNameLetter) ?>. <?= htmlspecialchars($copyrightPersonPatronymicNameLetter) ?>. <?= htmlspecialchars($details->createdByPersons[0]->surname) ?></span>, <span
				class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?>.</span></div>
	<?php else: ?>
		<div class="copyright copyright-name">© <span class="inserted">. .</span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?>.</span></div>
	<?php endif; ?>

	<div class="copyright">© <span class="global"><?= htmlspecialchars($details->globalData->universityShortName) ?></span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> рік</div>

</page>

<page backtop="20mm" backbottom="25mm" backleft="25mm" backright="10mm">
	<div class="topic-title-page-start">1. Опис навчальної дисципліни</div>
	<p class="indent">Таблиця 1.1 - Опис навчальної дисципліни</p>
	<?php
	$wpDescriptionColumnWidth = 100; // Початкову ширину колонкок "Найменування показників" та "Галузь знань, спец..." (у відсотках)
	$wpCharacteristicsPartColumnWidth = 12; // Ширина для однієї форми навчання одного семестру
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
	<table class="large-bottom-margin">
		<tr>
			<th style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" rowspan="2" colspan="2">
				Найменування показників
			</th>
			<th style="width: <?= htmlspecialchars($descColumnWidth) ?>%" rowspan="2">
				Галузь знань, спеціальність, освітні програми, рівень вищої освіти
			</th>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				Характеристика навчальної дисципліни
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
				Модулів<br><span class="change">1</span>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				Рік підготовки (курс)
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
				<?= htmlspecialchars($details->specialtyName) ?>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">
				<p>Семестр</p>
			</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->semesterNumber) ?>
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
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Практичні</th>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($indicatorsColumnWidth) ?>%" class="center" colspan="2" rowspan="2">
				Загальна кількість годин<br><span class="change">150</span>
			</td>
			<td style="width: <?= htmlspecialchars($descColumnWidth) ?>%" class="inserted center" rowspan="7">
				<b>Освітня програма</b><br><span class="inserted"><?= htmlspecialchars($details->educationalProgram) ?></span>
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
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Семінарські</th>
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
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Лабораторні</th>
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
				<b>Рівень вищої освіти</b><br><span class="inserted"><?= htmlspecialchars($details->degreeId) ?></span>
			</td>
			<th style="width: <?= htmlspecialchars($wpCharacteristicsColumnWidth) ?>%" class="center none-border-left" colspan="<?= htmlspecialchars($amountOfEducationalFormsAndSemesters) ?>">Самостійна робота</th>
		</tr>
		<tr>
			<?php foreach ($details->availableEducationalForms as $availableEducationalForm): ?>
				<?php foreach ($semestersByEducationalForm[$availableEducationalForm->colName] as $semesterByEducationalForm): ?>
					<td style="width: <?= htmlspecialchars($columnWidthByEducationalForm[$availableEducationalForm->colName]) ?>%;" class="inserted center none-border-left">
						<?= htmlspecialchars($semesterByEducationalForm->totalHoursForSelfworks[$availableEducationalForm->colName]) ?> год.
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
						<?= htmlspecialchars($semesterByEducationalForm->examType) ?>
					</td>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tr>
	</table>

	<div class="bold">Примітка:</div>
	<p class="inserted indent justify"><?= htmlspecialchars($details->notes) ?></p>

	<div class="topic-title">
		2. Передумови для вивчення дисципліни
	</div>
	<p class="indent inserted justify"><?= htmlspecialchars($details->prerequisites) ?></p>

	<div class="topic-title">
		3. Мета та завдання навчальної дисципліни
	</div>
	<p class="indent inserted justify"><?= htmlspecialchars($details->goal) ?></p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->tasks) ?></p>
	<p class="indent bold">Компетентності, якими повинен оволодіти здобувач в результаті вивчення дисципліни:</p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->competences) ?></p>
	<p class="indent bold">Програмні результати:</p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->programResults) ?></p>
	<p class="indent bold">Контрольні заходи:</p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->controlMeasures) ?></p>

	<div class="topic-title">
		4. Програма навчальної дисципліни
	</div>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semesterData): ?>
			<?php if (!empty($semesterData->modules)): ?>
				<?php foreach ($semesterData->modules as $moduleData): ?>
					<p class="inserted indent bold justify">
						Змістовий модуль <?= htmlspecialchars($moduleData->moduleNumber) ?>. <?= htmlspecialchars($moduleData->moduleName) ?>.
					</p>
					<?php if (!empty($moduleData->themes)): ?>
						<?php foreach ($moduleData->themes as $themeData): ?>
							<p class="indent inserted justify">
								<span class="inserted bold italic">Тема <?= htmlspecialchars($themeData->themeNumber) ?>. <?= htmlspecialchars($themeData->name) ?>.</span>
								<?= htmlspecialchars($themeData->description) ?>.
							</p>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<div class="topic-title">
		5. Структура навчальної дисципліни
	</div>
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
					<th colspan="<?= htmlspecialchars($hoursColSpan + 1) ?>" class="inserted">Семестр <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?></th>
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

	<?php
	// Визначаємо початкову ширину колонки "Назва теми" (у відсотках) для таблиць з заняттями
	$lessonNameColumnWidth = 95; // 5% для колонки з номером за порядком

	// Віднімаємо від ширини колонки "Назва ..." ширину колонок для кількості годин (15%) на кожну форму навчання
	foreach ($details->availableEducationalForms as $availableEducationalForm) {
		$lessonNameColumnWidth -= 15;
	}
	?>
	<div class="topic-title">
		6. Семінарські заняття
	</div>
	<?php
	$isSeminarsExists = false;

	if (!empty($details->semesters)) {
		foreach ($details->semesters as $semester) {
			if (!empty($semester->seminars)) {
				$isSeminarsExists = true;
			}
		}
	}
	?>
	<?php if ($isSeminarsExists): ?>
		<p class="indent">Таблиця 6.1 - Теми семінарських занять</p>
		<table>
			<tr>
				<th style="width: 5%;">№ з/п</th>
				<th style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Назва теми</th>
				<?php foreach ($semester->educationalForms as $educationalForm): ?>
					<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
				<?php endforeach; ?>
			</tr>

			<?php foreach ($details->semesters as $semester): ?>
				<?php if (!empty($semester->seminars)): ?>
					<tr>
						<th style="width: 5%;"></th>
						<th class="inserted" style="width: 65%;">Семестр <?= htmlspecialchars($semester->semesterNumber) ?></th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th style="width: 15%;"></th>
						<?php endforeach; ?>
					</tr>
					<?php foreach ($semester->seminars as $seminar): ?>
						<?php
						$educationalFormHours = [];
						if (!empty($seminar->educationalFormHours)) {
							foreach ($seminar->educationalFormHours as $form) {
								$educationalFormHours[$form->lessonFormName] = $form->hours;
							}
						}
						?>
						<tr>
							<td class="center inserted" style="width: 5%;"><?= $seminar->lessonNumber ? htmlspecialchars($seminar->lessonNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $seminar->lessonName ? htmlspecialchars($seminar->lessonName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього за <?= htmlspecialchars($semester->semesterNumber) ?> семестр:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="calculated" style="width: 15%;"><?= isset($semester->totalHoursForSeminars[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForSeminars[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<p class="indent">Семінарські заняття не передбачені.</p>
	<?php endif; ?>

	<div class="topic-title">
		7. Практичні заняття
	</div>
	<?php
	$isPracticalsExists = false;

	if (!empty($details->semesters)) {
		foreach ($details->semesters as $semester) {
			if (!empty($semester->practicals)) {
				$isPracticalsExists = true;
			}
		}
	}
	?>
	<?php if ($isPracticalsExists): ?>
		<p class="indent">Таблиця 7.1 - Теми практичних занять</p>
		<table>
			<tr>
				<th style="width: 5%;">№ з/п</th>
				<th style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Назва теми</th>
				<?php foreach ($semester->educationalForms as $educationalForm): ?>
					<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
				<?php endforeach; ?>
			</tr>

			<?php foreach ($details->semesters as $semester): ?>
				<?php if (!empty($semester->practicals)): ?>
					<tr>
						<th style="width: 5%;"></th>
						<th class="inserted" style="width: 65%;">Семестр <?= htmlspecialchars($semester->semesterNumber) ?></th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th style="width: 15%;"></th>
						<?php endforeach; ?>
					</tr>
					<?php foreach ($semester->practicals as $practical): ?>
						<?php
						$educationalFormHours = [];
						if (!empty($practical->educationalFormHours)) {
							foreach ($practical->educationalFormHours as $form) {
								$educationalFormHours[$form->lessonFormName] = $form->hours;
							}
						}
						?>
						<tr>
							<td class="center inserted" style="width: 5%;"><?= $practical->lessonNumber ? htmlspecialchars($practical->lessonNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $practical->lessonName ? htmlspecialchars($practical->lessonName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього за <?= htmlspecialchars($semester->semesterNumber) ?> семестр:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="calculated" style="width: 15%;"><?= isset($semester->totalHoursForPracticals[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForPracticals[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<p class="indent">Практичні заняття не передбачені.</p>
	<?php endif; ?>

	<div class="topic-title">
		8. Лабораторні заняття
	</div>
	<?php
	$isLabsExists = false;

	if (!empty($details->semesters)) {
		foreach ($details->semesters as $semester) {
			if (!empty($semester->labs)) {
				$isLabsExists = true;
			}
		}
	}
	?>
	<?php if ($isLabsExists): ?>
		<p class="indent">Таблиця 8.1 - Теми лабораторних занять</p>
		<table>
			<tr>
				<th style="width: 5%;">№ з/п</th>
				<th style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Назва теми</th>
				<?php foreach ($semester->educationalForms as $educationalForm): ?>
					<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
				<?php endforeach; ?>
			</tr>

			<?php foreach ($details->semesters as $semester): ?>
				<?php if (!empty($semester->labs)): ?>
					<tr>
						<th style="width: 5%;"></th>
						<th class="inserted" style="width: 65%;">Семестр <?= htmlspecialchars($semester->semesterNumber) ?></th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th style="width: 15%;"></th>
						<?php endforeach; ?>
					</tr>
					<?php foreach ($semester->labs as $lab): ?>
						<?php
						$educationalFormHours = [];
						if (!empty($lab->educationalFormHours)) {
							foreach ($lab->educationalFormHours as $form) {
								$educationalFormHours[$form->lessonFormName] = $form->hours;
							}
						}
						?>
						<tr>
							<td class="center inserted" style="width: 5%;"><?= $lab->lessonNumber ? htmlspecialchars($lab->lessonNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $lab->lessonName ? htmlspecialchars($lab->lessonName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього за <?= htmlspecialchars($semester->semesterNumber) ?> семестр:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="calculated" style="width: 15%;"><?= isset($semester->totalHoursForLabs[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForLabs[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<p class="indent">Лабораторні заняття не передбачені.</p>
	<?php endif; ?>

	<div class="topic-title">
		9. Самостійна робота
	</div>

	<?php
	$isSelfworksExists = false;

	if (!empty($details->semesters)) {
		foreach ($details->semesters as $semester) {
			if (!empty($semester->selfworks)) {
				$isSelfworksExists = true;
			}
		}
	}
	?>
	<?php if ($isSelfworksExists): ?>
		<p class="indent">Таблиця 9.1 - Теми самостійних робіт</p>
		<table>
			<tr>
				<th style="width: 5%;">№ з/п</th>
				<th style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Назва теми</th>
				<?php foreach ($semester->educationalForms as $educationalForm): ?>
					<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
				<?php endforeach; ?>
			</tr>

			<?php foreach ($details->semesters as $semester): ?>
				<?php if (!empty($semester->selfworks)): ?>
					<tr>
						<th style="width: 5%;"></th>
						<th class="inserted" style="width: 65%;">Семестр <?= htmlspecialchars($semester->semesterNumber) ?></th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th style="width: 15%;"></th>
						<?php endforeach; ?>
					</tr>
					<?php foreach ($semester->selfworks as $selfwork): ?>
						<?php
						$educationalFormHours = [];
						if (!empty($selfwork->educationalFormHours)) {
							foreach ($selfwork->educationalFormHours as $form) {
								$educationalFormHours[$form->lessonFormName] = $form->hours;
							}
						}
						?>
						<tr>
							<td class="center inserted" style="width: 5%;"><?= $selfwork->lessonNumber ? htmlspecialchars($selfwork->lessonNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $selfwork->lessonName ? htmlspecialchars($selfwork->lessonName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього за <?= htmlspecialchars($semester->semesterNumber) ?> семестр:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="calculated" style="width: 15%;"><?= isset($semester->totalHoursForSelfworks[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForSelfworks[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<p class="indent">Самостійні роботи не передбачені.</p>
	<?php endif; ?>

	<div class="topic-title">
		10. Індивідуальні завдання
	</div>
	<p class="indent inserted justify"><?= isset($details->individualTaskNotes) ? htmlspecialchars($details->individualTaskNotes) : "" ?></p>

	<div class="topic-title">
		11. Методи навчання
	</div>
	<p class="indent inserted justify"><?= isset($details->studingMethods) ? htmlspecialchars($details->studingMethods) : '' ?></p>

	<div class="topic-title">
		12. Методи контролю
	</div>
	<p class="indent inserted justify"><?= isset($details->examingMethods) ? htmlspecialchars($details->examingMethods) : '' ?></p>

	<div class="topic-title">
		13. Розподіл балів, які отримують студенти
	</div>
	<p class="indent justify">Оцінювання знань, умінь та навичок здобувачів вищої освіти з окремих видів роботи та в цілому по модулях (в балах) відображено в таблиці 13.1.</p>
	<p class="indent justify">13.1 - Оцінювання знань, умінь та навичок з окремих видів роботи та в цілому по модулях (в балах)</p>

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
		$startedNumberOfCourseworkTable = 2;
		?>
		<?php if (!empty($details->semesters)): ?>
			<?php foreach ($details->semesters as $semesterData): ?>
				<?php if ($semesterData->isCourseworkExists && $semesterData->courseworkAssessmentComponents): ?>
					<p class="indent justify inserted">Оцінювання знань, умінь та навичок здобувачів вищої освіти за результатами виконання курсового проєкту в семестрі <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?> (в балах) відображено в таблиці 13.<?= htmlspecialchars($startedNumberOfCourseworkTable) ?>.</p>
					<p class="indent justify inserted">13.<?= htmlspecialchars($startedNumberOfCourseworkTable++) ?> - Оцінювання знань, умінь та навичок в балах за результатами виконання курсового проєкту в семестрі <?= htmlspecialchars($semesterData->semesterNumber ?? '') ?> (в балах)</p>

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
								$totalCourseworkPoints += $points;
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

	<p class="indent">Шкала оцінювання в балах та ЄКТС відображена в таблиці 13.<?= htmlspecialchars($startedNumberOfCourseworkTable) ?>.</p>
	<p class="indent">13.<?= htmlspecialchars($startedNumberOfCourseworkTable) ?> - Шкала оцінювання в балах та ЄКТС</p>
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


	<div class="topic-title">
		14. Методичне забезпечення
	</div>
	<p class="indent inserted justify"><?= isset($details->methodologicalSupport) ? htmlspecialchars($details->methodologicalSupport) : '' ?></p>
	<div class="topic-title">
		15. Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти
	</div>
	<p class="indent justify">У даному розділі представлено загальні критерії оцінювання знань, умінь та навичок здобувачів вищої освіти (див. табл. 15.1)<?php if ($structure->isCourseworkExists): ?>, критерії за індивідуальним завданням курсової роботи (див. табл. 15.2)<?php endif; ?> та критерії за видами робіт (див. табл. 15.<?php if ($structure->isCourseworkExists): ?>3<?php else: ?>2<?php endif; ?>).</p>
	<p class="indent justify">15.1 Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти</p>
	<table class="assessment-criteria-table small-bottom-margin">
		<tr>
			<th style="width: 12%;">Рівень компе-<br>тентно-<br>сті</th>
			<th style="width: 10%;">За баль-<br>ною шкалою</th>
			<th style="width: 10%;">За шкалою ECTS</th>
			<th style="width: 68%;">Критерії оцінювання</th>
		</tr>
		<tr>
			<td style="width: 12%;" class="center">IV<br>Високий<br>(творчий)</td>
			<td style="width: 10%;" class="center">90 - 100</td>
			<td style="width: 10%;" class="center">A</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->A) ?></td>
		</tr>
		<tr>
			<td style="width: 12%;" class="center" rowspan="2">III<br>Доста-<br>тній<br>(констру-<br>ктивний)</td>
			<td style="width: 10%;" class="center">82 - 89</td>
			<td style="width: 10%;" class="center">B</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->B) ?></td>
		</tr>
		<tr>
			<td style="width: 10%;" class="none-border-left center">75 - 81</td>
			<td style="width: 10%;" class="center">C</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->C) ?></td>
		</tr>
		<tr>
			<td style="width: 12%;" class="center" rowspan="2">II<br>Середній<br>(репро-<br>дуктив-<br>ний)</td>
			<td style="width: 10%;" class="center">64 - 74</td>
			<td style="width: 10%;" class="center">D</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->D) ?></td>
		</tr>
		<tr>
			<td style="width: 10%;" class="none-border-left center">60 - 63</td>
			<td style="width: 10%;" class="center">E</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->E) ?></td>
		</tr>
		<tr>
			<td style="width: 12%;" class="center" rowspan="2">І<br>Низький</td>
			<td style="width: 10%;" class="center">35 - 59</td>
			<td style="width: 10%;" class="center">FX</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->FX) ?></td>
		</tr>
		<tr>
			<td style="width: 10%;" class="none-border-left center">0 - 34</td>
			<td style="width: 10%;" class="center">F</td>
			<td style="width: 68%;" class="global"><?= htmlspecialchars($details->globalData->generalAssessmentCriteria->F) ?></td>
		</tr>
	</table>
	<?php if ($structure->isCourseworkExists): ?>
		<p class="indent justify">15.2 Критерії оцінювання знань, умінь та навичок здобувачів за індивідуальним завданням курсової роботи</p>
		<table class="assessment-criteria-table small-bottom-margin">
			<tr>
				<th style="width: 12%;" rowspan="2">Рівень компе-<br>тентно-<br>сті</th>
				<th style="width: 10%;" rowspan="2">За шкалою ECTS</th>
				<th style="width: 78%;">Критерії оцінювання</th>
			</tr>
			<tr>
				<td style="width: 12%;" class="center">IV<br>Високий<br>(творчий)</td>
				<td style="width: 10%;" class="center">A</td>
				<td style="width: 78%;" class="global">
					<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->A) ?>
				</td>
			</tr>
			<tr>
				<td style="width: 12%;" class="center" rowspan="2">III<br>Доста-<br>тній<br>(констру-<br>ктивний)</td>
				<td style="width: 10%;" class="center">B</td>
				<td style="width: 78%;" class="global">
					<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->B) ?>
				</td>
			</tr>
			<tr>
				<td style="width: 10%;" class="center none-border-left">C</td>
				<td style="width: 78%;" class="global">
					<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->C) ?>
				</td>
			</tr>
			<tr>
				<td style="width: 12%;" class="center" rowspan="2">II<br>Середній<br>(репро-<br>дуктив-<br>ний)</td>
				<td style="width: 10%;" class="center">D</td>
				<td style="width: 78%;" class="global">
					<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->D) ?>
				</td>
			</tr>
			<tr>
				<td style="width: 10%;" class="center none-border-left">E</td>
				<td style="width: 78%;" class="global">
					<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->E) ?>
				</td>
			</tr>
			<tr>
				<td style="width: 12%;" class="center">І<br>Низький</td>
				<td style="width: 10%;" class="center">FX, F</td>
				<td style="width: 78%;" class="global">
					<?= htmlspecialchars($details->globalData->courseworkAssessmentCriteria->FXAndF) ?>
				</td>
			</tr>
		</table>
	<?php endif; ?>
	<p class="indent justify">15.<?php if ($structure->isCourseworkExists): ?>3<?php else: ?>2<?php endif; ?> Критерії оцінювання знань, умінь та навичок здобувачів за видами робіт</p>
	<?php
	$fullTableWidth = 100;
	$minColloquiumColumnWidth = 15;
	$colloquiumColumnWidth = 15;
	$lessonsTypesAmount = 0;
	$competenceLevelColumnWidth = 12;
	$ECTSColumnWidth = 10;

	$assessmentsCriteriaColumns = [
		'width' => 0,
		'colspan' => 0
	];

	if ($structure->isColloquiumExists && !$structure->isPracticalsExist && !$structure->isLabsExists && !$structure->isSeminarExists) {
		$assessmentsCriteriaColumns['colspan'] = 1;
		$assessmentsCriteriaColumns['width'] = $fullTableWidth - $competenceLevelColumnWidth - $ECTSColumnWidth;
		$colloquiumColumnWidth = $fullTableWidth - $competenceLevelColumnWidth - $ECTSColumnWidth;
	} elseif ($structure->isColloquiumExists) {
		$assessmentsCriteriaColumns['colspan'] += 1;
		$colloquiumColumnWidth = $minColloquiumColumnWidth;
	}

	if ($structure->isPracticalsExist) {
		$lessonsTypesAmount += 1;
		$assessmentsCriteriaColumns['colspan'] += 1;
	}

	if ($structure->isLabsExists) {
		$lessonsTypesAmount += 1;
		$assessmentsCriteriaColumns['colspan'] += 1;
	}

	if ($structure->isSeminarExists) {
		$lessonsTypesAmount += 1;
		$assessmentsCriteriaColumns['colspan'] += 1;
	}

	$freeWidth = $fullTableWidth - $competenceLevelColumnWidth - $ECTSColumnWidth - $minColloquiumColumnWidth;
	$lessonTypeColumnWidth = $freeWidth / $lessonsTypesAmount;
	?>
	<table class="assessment-criteria-table small-bottom-margin">
		<tr>
			<th style="width: <?= htmlspecialchars($competenceLevelColumnWidth) ?>%;" rowspan="2">Рівень компе-<br>тентно-<br>сті</th>
			<th style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" rowspan="2">За шкалою ECTS</th>
			<th
				style="width: <?= htmlspecialchars($assessmentsCriteriaColumns['width']) ?>%;"
				colspan="<?= htmlspecialchars($assessmentsCriteriaColumns['colspan']) ?>">
				Критерії оцінювання
			</th>
		</tr>
		<tr>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left">
					Практичне завдання
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left">
					Лабораторна робота
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left">
					Семінарська робота
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<th style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="none-border-left">
					Колоквіум (тести)
				</th>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($competenceLevelColumnWidth) ?>%;" class="center">IV<br>Високий<br>(творчий)</td>
			<td style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" class="center">A</td>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->A) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->labAssessmentCriteria->A) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->A) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
					<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->A) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($competenceLevelColumnWidth) ?>%;" class="center" rowspan="2">III<br>Доста-<br>тній<br>(констру-<br>ктивний)</td>
			<td style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" class="center">B</td>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->B) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->labAssessmentCriteria->B) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->B) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
					<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->B) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" class="center none-border-left">C</td>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->C) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->labAssessmentCriteria->C) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->C) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
					<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->C) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($competenceLevelColumnWidth) ?>%;" class="center" rowspan="2">II<br>Середній<br>(репро-<br>дуктив-<br>ний)</td>
			<td style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" class="center">D</td>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->D) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->labAssessmentCriteria->D) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->D) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
					<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->D) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" class="center none-border-left">E</td>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->E) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->labAssessmentCriteria->E) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->E) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
					<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->E) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($competenceLevelColumnWidth) ?>%;" class="center">І<br>Низький</td>
			<td style="width: <?= htmlspecialchars($ECTSColumnWidth) ?>%;" class="center">FX, F</td>
			<?php if ($structure->isPracticalsExist): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->FXAndF) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isLabsExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->labAssessmentCriteria->FXAndF) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isSeminarExists): ?>
				<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
					<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->FXAndF) ?>
				</th>
			<?php endif; ?>
			<?php if ($structure->isColloquiumExists): ?>
				<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
					<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->FXAndF) ?>
				</td>
			<?php endif; ?>
		</tr>
	</table>

	<div class="topic-title">
		16. Академічні права та обов’язки
	</div>
	<p class="indent inserted"><?= isset($details->globalData->academicRightsAndResponsibilities) ? htmlspecialchars($details->globalData->academicRightsAndResponsibilities) : '' ?></p>

	<div class="topic-title">
		17. Рекомендована література
	</div>
	<?php if (isset($details->literature->main)): ?>
		<div class="sub-topic-title">
			Основна
		</div>
		<p class="indent inserted" style="width: 100%"><?= htmlspecialchars($details->literature->main) ?></p>
	<?php endif; ?>
	<?php if (isset($details->literature->supporting)): ?>
		<div class="sub-topic-title">
			Допоміжна
		</div>
		<p class="indent inserted" style="width: 100%"><?= htmlspecialchars($details->literature->supporting) ?></p>
	<?php endif; ?>
	<?php if (isset($details->literature->additional)): ?>
		<div class="sub-topic-title">
			Додаткова
		</div>
		<p class="indent inserted" style="width: 100%"><?= htmlspecialchars($details->literature->additional) ?></p>
	<?php endif; ?>
	<?php if (isset($details->literature->informationResources)): ?>
		<div class="sub-topic-title">
			Інформаційні ресурси
		</div>
		<p class="indent inserted" style="width: 100%"><?= htmlspecialchars($details->literature->informationResources) ?></p>
	<?php endif; ?>
</page>