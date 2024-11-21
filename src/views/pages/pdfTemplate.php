<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<div class="center">Вінницький національний технічний університет</div>
	<div class="center inserted"><?= htmlspecialchars($details->facultyName) ?></div>
	<div class="center inserted small-bottom-margin"><?= htmlspecialchars($details->departmentName) ?></div>
	<div class="right ">ЗАТВЕРДЖУЮ</div>
	<div class="approved-position-container import">
		<div class="right approved-position">Проректор з науково-педагогічної роботи та організації освітнього процесу</div>
	</div>
	<div class="right">__________ <span class="import">Олександр ПЕТРОВ</span></div>
	<div class="right">"___"____________ <span class="inserted"><?= htmlspecialchars($details->regularYear) ?></span> року</div>
	<div class="center">
		<img src="src/images/logo.png" style="width: 60mm" alt="logo">
	</div>

	<div class="center">РОБОЧА ПРОГРАМА НАВЧАЛЬНОЇ ДИСЦИПЛІНИ</div>
	<div class="center inserted uppercase bold"><?= htmlspecialchars($details->disciplineName) ?></div>
	<div class="center title-placeholder small-bottom-margin">(шифр і назва навчальної дисципліни)</div>

	<div class="basic-info">
		<b class="basic-info-name">рівень вищої освіти</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->degreeName) ?></u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">галузь знань</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->fielfOfStudyIdx) ?>
			</span> – <span class="inserted">
				<?= htmlspecialchars($details->fielfOfStudyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">спеціальність</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->specialtyIdx) ?>
			</span> – <span class="inserted">
				<?= htmlspecialchars($details->specialtyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info small-bottom-margin">
		<b class="basic-info-name">освітня програма</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->educationalProgram) ?></u>
	</div>
	<div class="center import large-bottom-margin"><b>СУЯ ВНТУ</b> -08-31.РП.013.01.24</div>
	<div class="center">ВНТУ, <span class="inserted"><?= htmlspecialchars($details->regularYear) ?></span></div>
</page>

<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<div class="topic-title-page-start">
		Робоча програма навчальної дисципліни <span class="inserted"><?= htmlspecialchars($details->disciplineName) ?></span>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">рівень вищої освіти</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->degreeName) ?></u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">галузь знань</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->fielfOfStudyIdx) ?>
			</span> – <span class="inserted">
				<?= htmlspecialchars($details->fielfOfStudyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">спеціальність</b>: <u class="basic-info-value"><span class="inserted">
				<?= htmlspecialchars($details->specialtyIdx) ?>
			</span> – <span class="inserted">
				<?= htmlspecialchars($details->specialtyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">освітня програма</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->educationalProgram) ?></u>
	</div>
	<div class="basic-info">
		<span class="import inserted"><?= htmlspecialchars($details->regularYear) ?></span> – <span class="import"> 14 c.</span>
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
			<td class="approved-second-col import">Професор кафедри АІІТ</td>
			<td class="approved-third-col inserted"><?= htmlspecialchars($details->createdByPersons[0]->degree) ?>, <?= htmlspecialchars($details->createdByPersons[0]->name) ?> <?= htmlspecialchars($details->createdByPersons[0]->surname) ?></td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td rowspan="3" class="approved-first-col">Схвалено</td>
			<td class="approved-second-col import">Гарант освітньої програми</td>
			<td class="approved-third-col import">к.т.н., доцент Володимир СЕВАСТЬЯНОВ</td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-second-col import none-border-left">Зав. кафедри АІІТ<br>
				Засідання кафедри АІІТ<br>
				(протокол № 1 від 13.08.2024 р.)
			</td>
			<td class="approved-third-col import">д.т.н., професор Олег БІСІКАЛО</td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-second-col import none-border-left">Голова вченої ради ФІІТА<br>
				Вчена рада ФІІТА<br>
				(протокол № 1 від 19.08.2024 р.)</td>
			<td class="approved-third-col import">к.т.н., доцент Володимир СЕВАСТЬЯНОВ</td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-first-col">Затверджено</td>
			<td class="approved-second-col import">Голова Ради з якості освіти<br>
				Рада з якості освіти ВНТУ<br>
				(протокол № _ від ___ 2024 р.)</td>
			<td class="approved-third-col import">к.т.н., доцент Олександр ПЕТРОВ</td>
			<td class="approved-forth-col"></td>
		</tr>
	</table>

	<div class="copyright copyright-name">© <span class="inserted"><?= htmlspecialchars($details->createdByPersons[0]->name) ?>. <?= htmlspecialchars($details->createdByPersons[0]->patronymicName) ?>. <?= htmlspecialchars($details->createdByPersons[0]->surname) ?></span>, <span
			class="inserted"><?= htmlspecialchars($details->regularYear) ?>.</span></div>
	<div class="copyright">© ВНТУ, <span class="inserted"><?= htmlspecialchars($details->regularYear) ?></span> рік</div>

</page>

<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<div class="topic-title-page-start">1. Опис навчальної дисципліни</div>
	<p class="indent">Таблиця 1.1 - Опис навчальної дисципліни</p>
	<table class="large-bottom-margin">
		<tr>
			<th class="characteristic-first-col" rowspan="2" colspan="2">
				Найменування показників
			</th>
			<th class="characteristic-second-col" rowspan="2">
				Галузь знань, спеціальність, освітні програми, рівень вищої освіти
			</th>
			<th class="characteristic-third-col" colspan="2">
				Характеристика навчальної дисципліни
			</th>
		</tr>
		<tr>
			<th style="width: 15%;" class="none-border-left">
				денна форма навчання
			</th>
			<th style="width: 15%;">
				заочна форма навчання
			</th>
		</tr>
		<tr>
			<td class="characteristic-first-col center" colspan="2">
				Кількість кредитів<br><span class="import">5</span>
			</td>
			<td class="inserted characteristic-second-col center">
				<b>Галузь знань</b><br>
				<?= htmlspecialchars($details->fielfOfStudyIdx) ?> – <?= htmlspecialchars($details->fielfOfStudyName) ?>
			</td>
			<td class="characteristic-third-col center" colspan="2">
				<span class="import">Обов'язкова (професійна чи загальна)</span>
			</td>
		</tr>
		<tr>
			<td class="characteristic-first-col center" colspan="2">
				Модулів<br><span class="import">1</span>
			</td>
			<td class="inserted characteristic-second-col center" rowspan="2">
				<b>Cпеціальність</b><br>
				<?= htmlspecialchars($details->specialtyIdx) ?> – <?= htmlspecialchars($details->specialtyName) ?>
			</td>
			<th class="characteristic-third-col center" colspan="2">
				Рік підготовки (курс)
			</th>
		</tr>
		<tr>
			<td class="characteristic-first-col center" colspan="2">
				Змістових модулів<br><span class="import">8</span>
			</td>

			<td class="inserted center"><?= htmlspecialchars($details->academicYear) ?></td>
			<td class="inserted center"><?= htmlspecialchars($details->academicYear) ?></td>
		</tr>
		<tr>
			<td class="characteristic-first-col center" colspan="2">
				Індивідуальне завдання<br><span class="import">-</span>
			</td>
			<td class="inserted characteristic-second-col center" rowspan="2">
				<b>Освітня програма</b><br><span class="inserted"><?= htmlspecialchars($details->educationalProgram) ?></span>
			</td>
			<th class="characteristic-third-col center" colspan="2">
				<p>Семестр</p>
			</th>
		</tr>
		<tr>
			<td class="characteristic-first-col center" colspan="2">
				Загальна кількість годин<br><span class="import">150</span>
			</td>

			<td class="inserted center"><?= htmlspecialchars($details->semesters[0]->semesterNumber) ?></td>
			<td class="inserted center"><?= htmlspecialchars($details->semesters[0]->semesterNumber) ?></td>
		</tr>
		<tr>
			<td class="characteristic-first-col center" colspan="2" rowspan="4">
				Тижневих годин для денної форми навчання
			</td>
			<td class="inserted characteristic-second-col center" rowspan="11">
				<b>Рівень вищої освіти</b><br><span class="inserted"><?= htmlspecialchars($details->degreeName) ?></span>
			</td>
			<th class="characteristic-third-col center" colspan="2">Лекції</th>
		</tr>
		<tr>
			<td class="import center none-border-left">36 год.</td>
			<td class="import center">10 год.</td>
		</tr>
		<tr>
			<th class="characteristic-third-col center none-border-left" colspan="2">Практичні, семінарські</th>
		</tr>
		<tr>
			<td class="import center none-border-left">27 год.</td>
			<td class="import center">5 год.</td>
		</tr>
		<tr>
			<td class="center" rowspan="4" style="width: 15%;">аудиторних</td>
			<td class="center" rowspan="4" style="width: 15%;">самостійної роботи студента</td>
			<th class="characteristic-third-col center" colspan="2">Лабораторні</th>
		</tr>
		<tr>
			<td class="import center none-border-left">-</td>
			<td class="import center">-</td>
		</tr>
		<tr>
			<th class="characteristic-third-col center none-border-left" colspan="2">Курсовий проєкт (робота)</th>
		</tr>
		<tr>
			<td class="import center none-border-left">-</td>
			<td class="import center">-</td>
		</tr>
		<tr>
			<td class="center import" rowspan="3" style="width: 15%;">6</td>
			<td class="center import" rowspan="3" style="width: 15%;">4</td>
			<th class="characteristic-third-col center none-border-left" colspan="2">Самостійна робота</th>
		</tr>
		<tr>
			<td class="import center none-border-left">87 год.</td>
			<td class="import center">135 год.</td>
		</tr>
		<tr>
			<td class="characteristic-third-col center none-border-left" colspan="2">
				<b>Вид контролю:</b><br>
				<span class="inserted"><?= htmlspecialchars($details->semesters[0]->examType) ?></span>
			</td>
		</tr>
	</table>
	<div class="bold">Примітка:</div>
	<p class="inserted indent"><?= htmlspecialchars($details->notes) ?></p>
	<p class="indent">Мова навчання – <span class="inserted"><?= htmlspecialchars($details->language) ?></span></p>

	<div class="topic-title">
		2. Передумови для вивчення дисципліни
	</div>
	<p class="indent inserted"><?= htmlspecialchars($details->prerequisites) ?></p>

	<div class="topic-title">
		3. Мета та завдання навчальної дисципліни
	</div>
	<p class="indent inserted"><?= htmlspecialchars($details->goal) ?></p>
	<p class="indent inserted"><?= htmlspecialchars($details->tasks) ?></p>
	<p class="indent bold">Компетентності, якими повинен оволодіти здобувач в результаті вивчення дисципліни:</p>
	<p class="indent inserted"><?= htmlspecialchars($details->competences) ?></p>
	<p class="indent bold">Програмні результати:</p>
	<p class="indent inserted"><?= htmlspecialchars($details->programResults) ?></p>
	<p class="indent bold">Контрольні заходи:</p>
	<p class="indent inserted"><?= htmlspecialchars($details->controlMeasures) ?></p>

	<div class="topic-title">
		4. Програма навчальної дисципліни
	</div>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semesterData): ?>
			<?php if (!empty($semesterData->modules)): ?>
				<?php foreach ($semesterData->modules as $moduleData): ?>
					<p class="inserted indent bold">
						Змістовий модуль <?= htmlspecialchars($moduleData->moduleNumber) ?>. <?= htmlspecialchars($moduleData->moduleName) ?>.
					</p>
					<?php if (!empty($moduleData->themes)): ?>
						<?php foreach ($moduleData->themes as $themeData): ?>
							<p class="indent inserted">
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

	// Визначаємо початкову кількість навчальних форм
	$allEducationalFormsAvailableInSemesters = [];

	if (!empty($details->semesters)) {

		// Перебираємо усі семестри
		foreach ($details->semesters as $semester) {

			// Якщо початкова кількість пуста, то копіюємо в неї форми навчання з семестру
			if (empty($allEducationalFormsAvailableInSemesters)) {
				$allEducationalFormsAvailableInSemesters = $semester->educationalForms;

				// Якщо ні, то порівнюємо кількість форм в поточному семестрі з уже записаними та обираємо більшу кількість 
			} else {
				if (count($semester->educationalForms) > count($allEducationalFormsAvailableInSemesters)) {
					$allEducationalFormsAvailableInSemesters = $semester->educationalForms;
				}
			}
		}

		// Віднімаємо від ширини колонки "Назви ..." ширину колонок для кількості годин (30%) на кожну форму навчання
		foreach ($allEducationalFormsAvailableInSemesters as $availableForm) {
			$nameColumnWidth -= 30;
		}

		// Обраховуємо ширину для запису всіх годин на всі доступні форми навчання 
		$hoursColumnWidth = 100 - $nameColumnWidth;
	}
	?>
	<table>
		<tr>
			<th style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" rowspan="4">Назви змістових модулів і тем</th>
			<th style="width: <?= htmlspecialchars($hoursColumnWidth) ?>%;" colspan="12">Кількість годин</th>
		</tr>
		<tr>
			<?php foreach ($allEducationalFormsAvailableInSemesters as $availableForm): ?>
				<th class="none-border-left" style="width: 30%;" colspan="6"><?= htmlspecialchars($availableForm->name) ?></th>
			<?php endforeach; ?>
		</tr>
		<tr>
			<?php foreach ($allEducationalFormsAvailableInSemesters as $availableForm): ?>
				<td class="rotated-total-cell none-border-left" style="width: 5%;" rowspan="2">
					<div>усього</div>
				</td>
				<td class="center" style="width: 25%;" colspan="5">у тому числі</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<?php foreach ($allEducationalFormsAvailableInSemesters as $availableForm): ?>
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
					<th colspan="13" class="inserted">Семестр <?= htmlspecialchars($semesterData->semesterNumber) ?></th>
				</tr>

				<?php if (!empty($semesterData->modules)): ?>
					<?php foreach ($semesterData->modules as $moduleData): ?>
						<tr>
							<th colspan="13">Модуль <?= htmlspecialchars($moduleData->moduleNumber) ?></th>
						</tr>
						<tr>
							<th colspan="13" class="inserted"><?= htmlspecialchars($moduleData->moduleName) ?></th>
						</tr>

						<?php if (!empty($moduleData->themes)): ?>
							<?php foreach ($moduleData->themes as $themeData): ?>
								<tr>
									<td style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" class="inserted">Тема <?= $themeData->themeNumber ? htmlspecialchars($themeData->themeNumber) : '' ?>. <?= htmlspecialchars($themeData->name) ?>. <?= htmlspecialchars($themeData->name) ?>.</td>
									<?php foreach ($allEducationalFormsAvailableInSemesters as $availableForm): ?>
										<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableForm->colName]->totalHours) ?></td>
										<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableForm->colName]->lectionHours) ?></td>
										<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableForm->colName]->practicalHours) ?></td>
										<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableForm->colName]->labHours) ?></td>
										<td class="import center"></td>
										<td class="inserted center"><?= htmlspecialchars($themeData->educationalFormHoursStructure[$availableForm->colName]->selfworkHours) ?></td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						<tr>
							<td style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" class="inserted bold">Разом за модулем <?= htmlspecialchars($moduleData->moduleNumber) ?></td>
							<?php foreach ($allEducationalFormsAvailableInSemesters as $availableForm): ?>
								<td class="inserted center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableForm->colName]->totalHours) ?></td>
								<td class="inserted center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableForm->colName]->lectionHours) ?></td>
								<td class="inserted center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableForm->colName]->practicalHours) ?></td>
								<td class="inserted center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableForm->colName]->labHours) ?></td>
								<td class="import center"></td>
								<td class="inserted center"><?= htmlspecialchars($moduleData->educationalFormHoursStructure[$availableForm->colName]->selfworkHours) ?></td>
							<?php endforeach; ?>
						</tr>

					<?php endforeach; ?>
				<?php endif; ?>
				<tr>
					<td style="width: <?= htmlspecialchars($nameColumnWidth) ?>%;" class="inserted bold">Усього за <?= htmlspecialchars($semesterData->semesterNumber) ?> семестр</td>
					<?php foreach ($allEducationalFormsAvailableInSemesters as $availableForm): ?>
						<td class="inserted center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableForm->colName]->totalHours) ?></td>
						<td class="inserted center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableForm->colName]->lectionHours) ?></td>
						<td class="inserted center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableForm->colName]->practicalHours) ?></td>
						<td class="inserted center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableForm->colName]->labHours) ?></td>
						<td class="import center"></td>
						<td class="inserted center"><?= htmlspecialchars($semesterData->educationalFormHoursStructure[$availableForm->colName]->selfworkHours) ?></td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</table>


	<div class="topic-title">
		6. Семінарські заняття
	</div>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semester): ?>
			<?php if (!empty($semester->seminars)): ?>
				<p class="indent">Таблиця 6.1 - Теми семінарських занять</p>
				<table>
					<tr>
						<th style="width: 5%;">№ з/п</th>
						<th style="width: 65%;">Кількість годин</th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
						<?php endforeach; ?>
					</tr>
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
							<td class="center inserted" style="width: 5%;"><?= $seminar->lessonThemeNumber ? htmlspecialchars($seminar->lessonThemeNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $seminar->lessonThemeName ? htmlspecialchars($seminar->lessonThemeName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;"><?= isset($semester->totalHoursForSeminars[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForSeminars[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				</table>
			<?php else: ?>
				<p class="indent">Семінарські заняття не передбачені.</p>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>


	<div class="topic-title">
		7. Практичні заняття
	</div>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semester): ?>
			<?php if (!empty($semester->practicals)): ?>
				<p class="indent">Таблиця 7.1 - Теми практичних занять</p>
				<table>
					<tr>
						<th style="width: 5%;">№ з/п</th>
						<th style="width: 65%;">Кількість годин</th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
						<?php endforeach; ?>
					</tr>
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
							<td class="center inserted" style="width: 5%;"><?= $practical->lessonThemeNumber ? htmlspecialchars($practical->lessonThemeNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $practical->lessonThemeName ? htmlspecialchars($practical->lessonThemeName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;"><?= isset($semester->totalHoursForPracticals[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForPracticals[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				</table>
			<?php else: ?>
				<p class="indent">Практичні заняття не передбачені.</p>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>


	<div class="topic-title">
		8. Лабораторні заняття
	</div>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semester): ?>
			<?php if (!empty($semester->labs)): ?>
				<p class="indent">Таблиця 8.1 - Теми лабораторних занять</p>
				<table>
					<tr>
						<th style="width: 5%;">№ з/п</th>
						<th style="width: 65%;">Кількість годин</th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
						<?php endforeach; ?>
					</tr>
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
							<td class="center inserted" style="width: 5%;"><?= $lab->lessonThemeNumber ? htmlspecialchars($lab->lessonThemeNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $lab->lessonThemeName ? htmlspecialchars($lab->lessonThemeName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;"><?= isset($semester->totalHoursForLabs[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForLabs[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				</table>
			<?php else: ?>
				<p class="indent">Лабораторні заняття не передбачені.</p>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>


	<div class="topic-title">
		9. Самостійна робота
	</div>
	<?php if (!empty($details->semesters)): ?>
		<?php foreach ($details->semesters as $semester): ?>
			<?php if (!empty($semester->selfworks)): ?>
				<p class="indent">Таблиця 9.1 - Теми самостійних робіт</p>
				<table>
					<tr>
						<th style="width: 5%;">№ з/п</th>
						<th style="width: 65%;">Кількість годин</th>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
						<?php endforeach; ?>
					</tr>
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
							<td class="center inserted" style="width: 5%;"><?= $selfwork->lessonThemeNumber ? htmlspecialchars($selfwork->lessonThemeNumber) : "" ?></td>
							<td class="inserted" style="width: 65%;"><?= $selfwork->lessonThemeName ? htmlspecialchars($selfwork->lessonThemeName) : "" ?></td>
							<?php foreach ($semester->educationalForms as $educationalForm): ?>
								<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$educationalForm->colName]) ? htmlspecialchars($educationalFormHours[$educationalForm->colName]) : "" ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th style="width: 5%;"></th>
						<td class="bold" style="width: 65%;">Всього:</td>
						<?php foreach ($semester->educationalForms as $educationalForm): ?>
							<th class="inserted" style="width: 15%;"><?= isset($semester->totalHoursForSelfworks[$educationalForm->colName]) ? htmlspecialchars($semester->totalHoursForSelfworks[$educationalForm->colName]) : 0 ?></th>
						<?php endforeach; ?>
					</tr>
				</table>
			<?php else: ?>
				<p class="indent">Самостійні роботи не передбачені.</p>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</page>