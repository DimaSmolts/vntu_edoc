<div class="empty"></div>
<div class="topic-title">
	15. Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти
</div>
<!-- <p class="indent justify">У даному розділі представлено загальні критерії оцінювання знань, умінь та навичок здобувачів вищої освіти (див. табл. 15.1)<?php if ($structure->isCourseworkExists): ?>, критерії за індивідуальним завданням курсової роботи (див. табл. 15.2)<?php endif; ?> та критерії за видами робіт (див. табл. 15.<?php if ($structure->isCourseworkExists): ?>3<?php else: ?>2<?php endif; ?>).</p>
<p class="indent justify">15.1 Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти</p> -->
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
	<div class="sub-topic-title">
		Критерії оцінювання знань, умінь та навичок здобувачів за індивідуальним завданням курсової роботи
	</div>
	<!-- <p class="indent justify">15.2 Критерії оцінювання знань, умінь та навичок здобувачів за індивідуальним завданням курсової роботи</p> -->
	<table class="assessment-criteria-table small-bottom-margin">
		<tr>
			<th style="width: 12%;">Рівень компе-<br>тентно-<br>сті</th>
			<th style="width: 10%;">За шкалою ECTS</th>
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
<div class="sub-topic-title">
	Критерії оцінювання знань, умінь та навичок здобувачів за видами робіт
</div>
<!-- <p class="indent justify">15.<?php if ($structure->isCourseworkExists): ?>3<?php else: ?>2<?php endif; ?> Критерії оцінювання знань, умінь та навичок здобувачів за видами робіт</p> -->
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

if ($structure->isLabsExist) {
	$lessonsTypesAmount += 1;
	$assessmentsCriteriaColumns['colspan'] += 1;
}

if ($structure->isSeminarsExist) {
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
		<?php if ($structure->isLabsExist): ?>
			<th style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left">
				Лабораторна робота
			</th>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
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
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->A) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->labAssessmentCriteria->A) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->A) ?>
			</td>
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
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->B) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->labAssessmentCriteria->B) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->B) ?>
			</td>
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
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->C) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->labAssessmentCriteria->C) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->C) ?>
			</td>
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
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->D) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->labAssessmentCriteria->D) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->D) ?>
			</td>
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
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->E) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->labAssessmentCriteria->E) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->E) ?>
			</td>
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
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->practicalAssessmentCriteria->FXAndF) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isLabsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->labAssessmentCriteria->FXAndF) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isSeminarsExist): ?>
			<td style="width: <?= htmlspecialchars($lessonTypeColumnWidth) ?>%;" class="none-border-left global">
				<?= htmlspecialchars($details->globalData->seminarAssessmentCriteria->FXAndF) ?>
			</td>
		<?php endif; ?>
		<?php if ($structure->isColloquiumExists): ?>
			<td style="width: <?= htmlspecialchars($colloquiumColumnWidth) ?>%;" class="global">
				<?= htmlspecialchars($details->globalData->colloquiumAssessmentCriteria->FXAndF) ?>
			</td>
		<?php endif; ?>
	</tr>
</table>