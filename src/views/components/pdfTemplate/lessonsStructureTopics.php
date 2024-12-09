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