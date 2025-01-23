<?php
require_once __DIR__ . '/../../../helpers/view/getConfigForCourseTypeWorkAssesmentCriteriaPDF.php';
require_once __DIR__ . '/../../../helpers/view/getConfigAndDataForAssesmentCriteriaByTypeOfWorkPDF.php';
?>
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
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->A) ?></td>
	</tr>
	<tr>
		<td style="width: 12%;" class="center" rowspan="2">III<br>Доста-<br>тній<br>(констру-<br>ктивний)</td>
		<td style="width: 10%;" class="center">82 - 89</td>
		<td style="width: 10%;" class="center">B</td>
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->B) ?></td>
	</tr>
	<tr>
		<td style="width: 10%;" class="none-border-left center">75 - 81</td>
		<td style="width: 10%;" class="center">C</td>
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->C) ?></td>
	</tr>
	<tr>
		<td style="width: 12%;" class="center" rowspan="2">II<br>Середній<br>(репро-<br>дуктив-<br>ний)</td>
		<td style="width: 10%;" class="center">64 - 74</td>
		<td style="width: 10%;" class="center">D</td>
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->D) ?></td>
	</tr>
	<tr>
		<td style="width: 10%;" class="none-border-left center">60 - 63</td>
		<td style="width: 10%;" class="center">E</td>
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->E) ?></td>
	</tr>
	<tr>
		<td style="width: 12%;" class="center" rowspan="2">І<br>Низький</td>
		<td style="width: 10%;" class="center">35 - 59</td>
		<td style="width: 10%;" class="center">FX</td>
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->FX) ?></td>
	</tr>
	<tr>
		<td style="width: 10%;" class="none-border-left center">0 - 34</td>
		<td style="width: 10%;" class="center">F</td>
		<td style="width: 68%;" class="global"><?= htmlspecialchars($details->assessmentCriterias['general']->F) ?></td>
	</tr>
</table>
<?php if ($structure->isCourseworkExists || $structure->isCourseProjectExists): ?>
	<?php
	$courseTypeWorkAssesmentCriteriaConfig = getConfigForCourseTypeWorkAssesmentCriteriaPDF($structure, $details);
	?>
	<div class="sub-topic-title">
		<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->topicTitle) ?>
	</div>
	<table class="assessment-criteria-table small-bottom-margin">
		<tr>
			<th rowspan="<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->headerRowSpan) ?>" style="width: 12%;">Рівень компе-<br>тентно-<br>сті</th>
			<th rowspan="<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->headerRowSpan) ?>" style="width: 10%;">За баль-<br>ною шкалою</th>
			<th rowspan="<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->headerRowSpan) ?>" style="width: 10%;">За шкалою ECTS</th>
			<th colspan="<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriaHeaderColSpan) ?>" style="width: 68%;">Критерії оцінювання</th>
		</tr>
		<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
			<tr>
				<th style="width: 34%;" class="none-border-left">Курсова робота</th>
				<th style="width: 34%;">Курсовий проєкт</th>
			</tr>
		<?php endif; ?>
		<tr>
			<td style="width: 12%;" class="center">IV<br>Високий<br>(творчий)</td>
			<td style="width: 10%;" class="center">90 - 100</td>
			<td style="width: 10%;" class="center">A</td>
			<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['coursework']->A) ?></td>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['courseProject']->A) ?></td>
			<?php else: ?>
				<td style="width: 68%;" class="global">
					<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriasForOneTypeOfWork->A) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: 12%;" class="center" rowspan="2">III<br>Доста-<br>тній<br>(констру-<br>ктивний)</td>
			<td style="width: 10%;" class="center">82 - 89</td>
			<td style="width: 10%;" class="center">B</td>
			<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['coursework']->B) ?></td>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['courseProject']->B) ?></td>
			<?php else: ?>
				<td style="width: 68%;" class="global">
					<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriasForOneTypeOfWork->B) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: 10%;" class="none-border-left center">75 - 81</td>
			<td style="width: 10%;" class="center none-border-left">C</td>
			<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['coursework']->C) ?></td>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['courseProject']->C) ?></td>
			<?php else: ?>
				<td style="width: 68%;" class="global">
					<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriasForOneTypeOfWork->C) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: 12%;" class="center" rowspan="2">II<br>Середній<br>(репро-<br>дуктив-<br>ний)</td>
			<td style="width: 10%;" class="center">64 - 74</td>
			<td style="width: 10%;" class="center">D</td>
			<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['coursework']->D) ?></td>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['courseProject']->D) ?></td>
			<?php else: ?>
				<td style="width: 68%;" class="global">
					<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriasForOneTypeOfWork->D) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: 10%;" class="none-border-left center">60 - 63</td>
			<td style="width: 10%;" class="center none-border-left">E</td>
			<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['coursework']->E) ?></td>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['courseProject']->E) ?></td>
			<?php else: ?>
				<td style="width: 68%;" class="global">
					<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriasForOneTypeOfWork->E) ?>
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td style="width: 12%;" class="center">І<br>Низький</td>
			<td style="width: 10%;" class="none-border-left center">0 - 59</td>
			<td style="width: 10%;" class="center">FX, F</td>
			<?php if ($structure->isCourseworkExists && $structure->isCourseProjectExists): ?>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['coursework']->FXAndF) ?></td>
				<td style="width: 34%;"><?= htmlspecialchars($details->assessmentCriterias['courseProject']->FXAndF) ?></td>
			<?php else: ?>
				<td style="width: 68%;" class="global">
					<?= htmlspecialchars($courseTypeWorkAssesmentCriteriaConfig->criteriasForOneTypeOfWork->FXAndF) ?>
				</td>
			<?php endif; ?>
		</tr>
	</table>
<?php endif; ?>
<?php
$configAndDataForAssesmentCriteriaByTypeOfWork = getConfigAndDataForAssesmentCriteriaByTypeOfWorkPDF($pointsDistributionRelatedData, $structure, $details);
?>
<div class="sub-topic-title">
	Критерії оцінювання знань, умінь та навичок здобувачів за видами робіт
</div>
<?php foreach ($configAndDataForAssesmentCriteriaByTypeOfWork as $assesmentCriteriaGroup): ?>
	<?php
	$config = $assesmentCriteriaGroup->config;
	$groupData = $assesmentCriteriaGroup->data;
	?>
	<table class="assessment-criteria-table small-bottom-margin">
		<tr>
			<th style="width: <?= htmlspecialchars($config->competenceLevelColumnWidth) ?>%;" rowspan="2">Рівень компе-<br>тентно-<br>сті</th>
			<th style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" rowspan="2">За шкалою ECTS</th>
			<th
				style="width: <?= htmlspecialchars($config->assessmentsCriteriaHeaderColumn->width) ?>%;"
				colspan="<?= htmlspecialchars($config->assessmentsCriteriaHeaderColumn->colspan) ?>">
				Критерії оцінювання
			</th>
		</tr>
		<tr>
			<?php foreach ($groupData as $criteriaData): ?>
				<th style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?= htmlspecialchars($criteriaData->header) ?>
				</th>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($config->competenceLevelColumnWidth) ?>%;" class="center">IV<br>Високий<br>(творчий)</td>
			<td style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" class="center">A</td>
			<?php foreach ($groupData as $criteriaData): ?>
				<td valign="top" style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?php foreach ($criteriaData->labels['A'] as $label): ?>
						<b><?= htmlspecialchars($label) ?></b><br>
					<?php endforeach ?>
					<?= htmlspecialchars($criteriaData->criterias->A) ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($config->competenceLevelColumnWidth) ?>%;" class="center" rowspan="2">III<br>Доста-<br>тній<br>(констру-<br>ктивний)</td>
			<td style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" class="center">B</td>
			<?php foreach ($groupData as $criteriaData): ?>
				<td valign="top" style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?php foreach ($criteriaData->labels['B'] as $label): ?>
						<b><?= htmlspecialchars($label) ?></b><br>
					<?php endforeach ?>
					<?= htmlspecialchars($criteriaData->criterias->B) ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" class="center none-border-left">C</td>
			<?php foreach ($groupData as $criteriaData): ?>
				<td valign="top" style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?php foreach ($criteriaData->labels['C'] as $label): ?>
						<b><?= htmlspecialchars($label) ?></b><br>
					<?php endforeach ?>
					<?= htmlspecialchars($criteriaData->criterias->C) ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($config->competenceLevelColumnWidth) ?>%;" class="center" rowspan="2">II<br>Середній<br>(репро-<br>дуктив-<br>ний)</td>
			<td style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" class="center">D</td>
			<?php foreach ($groupData as $criteriaData): ?>
				<td valign="top" style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?php foreach ($criteriaData->labels['D'] as $label): ?>
						<b><?= htmlspecialchars($label) ?></b><br>
					<?php endforeach ?>
					<?= htmlspecialchars($criteriaData->criterias->D) ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" class="center none-border-left">E</td>
			<?php foreach ($groupData as $criteriaData): ?>
				<td valign="top" style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?php foreach ($criteriaData->labels['E'] as $label): ?>
						<b><?= htmlspecialchars($label) ?></b><br>
					<?php endforeach ?>
					<?= htmlspecialchars($criteriaData->criterias->E) ?>
				</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td style="width: <?= htmlspecialchars($config->competenceLevelColumnWidth) ?>%;" class="center">І<br>Низький</td>
			<td style="width: <?= htmlspecialchars($config->ECTSColumnWidth) ?>%;" class="center">FX, F</td>
			<?php foreach ($groupData as $criteriaData): ?>
				<td valign="top" style="width: <?= htmlspecialchars($config->assessmentsCriteriaColumnWidth) ?>%;" class="none-border-left">
					<?php foreach ($criteriaData->labels['FXAndF'] as $label): ?>
						<b><?= htmlspecialchars($label) ?></b><br>
					<?php endforeach ?>
					<?= htmlspecialchars($criteriaData->criterias->FXAndF) ?>
				</td>
			<?php endforeach; ?>
		</tr>
	</table>
<?php endforeach; ?>