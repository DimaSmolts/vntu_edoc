<?php
// Визначаємо початкову ширину колонки "Назва теми" (у відсотках) для таблиць з заняттями
$lessonNameColumnWidth = 95; // 5% для колонки з номером за порядком

// Віднімаємо від ширини колонки "Назва ..." ширину колонок для кількості годин (15%) на кожну форму навчання
foreach ($details->availableEducationalForms as $availableEducationalForm) {
	$lessonNameColumnWidth -= 15;
}

$educationalFormsInSemesters = [];

foreach ($details->semesters as $semester) {
	foreach ($semester->educationalForms as $educationalForm) {
		$educationalFormsInSemesters[$educationalForm->colName] = $educationalForm->name;
	}
}
?>

<?php if ($structure->isLabsExist): ?>
	<div class="topic-title">
		8. Теми лабораторних занять
	</div>
	<table>
		<tr>
			<th style="width: 5%;">№ з/п</th>
			<th style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Назва теми</th>
			<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
				<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($name) ?> форма)</th>
			<?php endforeach; ?>
		</tr>

		<?php foreach ($details->semesters as $semester): ?>
			<?php if (!empty($semester->labs)): ?>
				<tr>
					<th style="width: 5%;"></th>
					<th class="inserted" style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Семестр <?= htmlspecialchars($semester->semesterNumber) ?></th>
					<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
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
						<td class="inserted" style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;"><?= $lab->lessonName ? htmlspecialchars($lab->lessonName) : "" ?></td>
						<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
							<td class="center inserted" style="width: 15%;"><?= isset($educationalFormHours[$colName]) ? htmlspecialchars($educationalFormHours[$colName]) : "" ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
				<tr>
					<th style="width: 5%;"></th>
					<td class="bold" style="width: <?= htmlspecialchars($lessonNameColumnWidth) ?>%;">Всього за <?= htmlspecialchars($semester->semesterNumber) ?> семестр:</td>
					<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
						<th class="calculated" style="width: 15%;"><?= isset($semester->totalHoursForLabs[$colName]) ? htmlspecialchars($semester->totalHoursForLabs[$colName]) : 0 ?></th>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
<?php else: ?>
	<div class="topic-title">
		8. Теми лабораторних занять – не передбачені
	</div>
<?php endif; ?>