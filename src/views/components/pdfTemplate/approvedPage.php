<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<div class="topic-title-page-start">
		Робоча програма навчальної дисципліни <span class="inserted"><?= htmlspecialchars($details->disciplineName) ?></span>
	</div>
	<div class="basic-info">
		<b class="basic-info-name">рівень вищої освіти</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->degreeName) ?></u>
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
				<td class="approved-third-col inserted"><?= htmlspecialchars($details->createdByPersons[0]->degree) ?>, <?= htmlspecialchars($details->createdByPersons[0]->name) ?></td>
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
	// $copyrightPersonNameLetter = "";
	// $copyrightPersonPatronymicNameLetter = "";

	// if (isset($details->createdByPersons[0])) {
	// 	$copyrightPersonNameLetter = mb_substr($details->createdByPersons[0]->name, 0, 1);
	// 	$copyrightPersonPatronymicNameLetter = mb_substr($details->createdByPersons[0]->patronymicName, 0, 1);
	// }
	?>
	<!-- <?php if (isset($details->createdByPersons[0])): ?>
		<div class="copyright copyright-name">© <span class="inserted"><?= htmlspecialchars($copyrightPersonNameLetter) ?>. <?= htmlspecialchars($copyrightPersonPatronymicNameLetter) ?>. <?= htmlspecialchars($details->createdByPersons[0]->surname) ?></span>, <span
				class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?>.</span></div>
	<?php else: ?> -->
	<div class="copyright copyright-name">© <span class="inserted">. .</span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?>.</span></div>
	<!-- <?php endif; ?> -->

	<div class="copyright">© <span class="global"><?= htmlspecialchars($details->globalData->universityShortName) ?></span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> рік</div>
</page>