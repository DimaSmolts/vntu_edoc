<?php
// Визначаємо початкову ширину колонки "Назва теми" (у відсотках) для таблиць з заняттями
$lectionNameColumnWidth = 95; // 5% для колонки з номером за порядком

// Віднімаємо від ширини колонки "Назва ..." ширину колонок для кількості годин (15%) на кожну форму навчання
foreach ($details->availableEducationalForms as $availableEducationalForm) {
	$lectionNameColumnWidth -= 15;
}
?>

<div class="empty"></div>
<div class="topic-title">
	5. Теми лекцій
</div>
<table>
	<tr>
		<th style="width: 5%;">№ з/п</th>
		<th style="width: <?= htmlspecialchars($lectionNameColumnWidth) ?>%;">Назва теми</th>
		<?php foreach ($semester->educationalForms as $educationalForm): ?>
			<th class="inserted" style="width: 15%;">К-ть годин (<?= htmlspecialchars($educationalForm->name) ?> форма)</th>
		<?php endforeach; ?>
	</tr>

	<?php foreach ($details->semesters as $semester): ?>
		<?php if (!empty($semester->lections)): ?>
			<tr>
				<th style="width: 5%;"></th>
				<th class="inserted" style="width: 65%;">Семестр <?= htmlspecialchars($semester->semesterNumber) ?></th>
				<?php foreach ($semester->educationalForms as $educationalForm): ?>
					<th style="width: 15%;"></th>
				<?php endforeach; ?>
			</tr>
			<?php foreach ($semester->lections as $lection): ?>
				<?php
				$educationalFormHours = [];
				if (!empty($lection->educationalFormHours)) {
					foreach ($lection->educationalFormHours as $form) {
						$educationalFormHours[$form->lessonFormName] = $form->hours;
					}
				}
				?>
				<tr>
					<td class="center inserted" style="width: 5%;"><?= htmlspecialchars($lection->lessonNumber ?? '') ?></td>
					<td class="inserted" style="width: 65%;">Тема <?= htmlspecialchars($lection->lessonNumber ?? '') ?>. <?= htmlspecialchars($lection->lessonName ?? '') ?></td>
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