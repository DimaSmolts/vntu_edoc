<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<!-- <div class="topic-title-page-start">
		Робоча програма навчальної дисципліни <span class="inserted">«<?= htmlspecialchars($details->disciplineName) ?>»</span>
	</div> -->
	<p class="justify">Робоча програма навчальної дисципліни <span class="span inserted">«<?= htmlspecialchars($details->disciplineName) ?>»</span></p>
	<div>
		<b>рівень вищої освіти</b> – <span class="inserted">
			<?= htmlspecialchars($details->stydingLevelId) ?>
		</span>
	</div>
	<div>
		<b>галузь знань</b> – <span class="inserted">
			<?= htmlspecialchars($details->fielfOfStudyName) ?>
		</span>
	</div>
	<div>
		<b>спеціальність</b> – <span class="inserted">
			<?= htmlspecialchars($details->specialtyName) ?>
		</span>
	</div>
	<div>
		<b>освітня програма</b> – <span class="inserted">
			<?= htmlspecialchars($details->educationalProgramIds) ?>
		</span>
	</div>
	<div>
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
			<!-- <?php if (isset($details->createdByPersons[0])): ?>
				<td class="approved-third-col inserted"><?= htmlspecialchars($details->createdByPersons[0]->degree) ?>, <?= htmlspecialchars($details->createdByPersons[0]->name) ?></td>
			<?php else: ?> -->
			<td class="approved-third-col change"></td>
		<?php endif; ?>
		<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td rowspan="3" class="approved-first-col">Схвалено</td>
			<td class="approved-second-col inserted"><?= isset($details->educationalProgramGuarantor) ? $details->educationalProgramGuarantor->positionAndMinutesOfMeeting : '' ?></td>
			<td class="approved-third-col inserted"><?= htmlspecialchars($details->educationalProgramGuarantor->degree ?? '') ?>, <?= htmlspecialchars($details->educationalProgramGuarantor->workPosition ?? '') ?> <?= htmlspecialchars($details->educationalProgramGuarantor->name ?? '') ?></td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-second-col none-border-left inserted"><?= isset($details->headOfDepartment) ? $details->headOfDepartment->positionAndMinutesOfMeeting : '' ?></td>
			<td class="approved-third-col inserted"><?= htmlspecialchars($details->headOfDepartment->degree ?? '') ?>, <?= htmlspecialchars($details->headOfDepartment->workPosition ?? '') ?> <?= htmlspecialchars($details->headOfDepartment->name ?? '') ?></td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-second-col none-border-left inserted"><?= isset($details->headOfCommission) ? $details->headOfCommission->positionAndMinutesOfMeeting : '' ?></td>
			<td class="approved-third-col inserted"><?= htmlspecialchars($details->headOfCommission->degree ?? '') ?>, <?= htmlspecialchars($details->headOfCommission->workPosition ?? '') ?> <?= htmlspecialchars($details->headOfCommission->name ?? '') ?></td>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<td class="approved-first-col">Затверджено</td>
			<td class="approved-second-col inserted"><?= isset($details->approvedBy) ? $details->approvedBy->positionAndMinutesOfMeeting : '' ?></td>
			<td class="approved-third-col inserted"><?= htmlspecialchars($details->approvedBy->degree ?? '') ?>, <?= htmlspecialchars($details->approvedBy->workPosition ?? '') ?> <?= htmlspecialchars($details->approvedBy->name ?? '') ?></td>
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