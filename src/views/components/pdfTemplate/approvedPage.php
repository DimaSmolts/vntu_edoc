<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<page_footer>
		<div class="center" style="position: absolute; bottom: 15mm; width: 100%;">
			[[page_cu]]
		</div>
	</page_footer>

	<!-- <div class="topic-title-page-start">
		Робоча програма навчальної дисципліни <span class="inserted">«<?= htmlspecialchars($details->disciplineName) ?>»</span>
	</div> -->
	<p class="justify">Робоча програма навчальної дисципліни <span class="span inserted">«<?= htmlspecialchars($details->disciplineName) ?>»</span></p>
	<div>
		<b>рівень вищої освіти</b> – <span class="inserted">
			<?= htmlspecialchars($details->stydingLevel->name) ?>
		</span>
	</div>
	<div>
		<b>галузь знань</b> – <span class="inserted">
			<?= htmlspecialchars($details->fielfOfStudyName) ?>
		</span>
	</div>
	<div class="basic-info">
		<?php
		$specialties = $details->specialties;
		$firstSpecialty = array_shift($specialties);
		?>
		<table class="table-without-borders" style="width: 100%">
			<tr>
				<th style="width: 21%">спеціальність –</th>
				<td style="width: 79%">
					<span class="inserted"><?= htmlspecialchars($firstSpecialty->code) ?> <?= htmlspecialchars($firstSpecialty->name) ?></span>
				</td>
			</tr>
			<?php if (!empty($specialties)): ?>
				<?php foreach ($specialties as $specialty): ?>
					<tr>
						<td style="width: 21%"></td>
						<td style="width: 79%">
							<span class="inserted"><?= htmlspecialchars($specialty->code) ?> <?= htmlspecialchars($specialty->name) ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</table>
	</div>
	<div>
		<?php
		$educationalPrograms = $details->educationalPrograms;
		$firstEducationalProgram = array_shift($educationalPrograms);
		?>
		<table class="table-without-borders" style="width: 100%">
			<tr>
				<th style="width: 25%">освітня програма –</th>
				<td style="width: 75%">
					<span class="inserted"><?= htmlspecialchars($firstEducationalProgram->name) ?></span>
				</td>
			</tr>
			<?php if (!empty($educationalPrograms)): ?>
				<?php foreach ($educationalPrograms as $educationalProgram): ?>
					<tr>
						<td style="width: 25%"></td>
						<td style="width: 75%">
							<span class="inserted"><?= htmlspecialchars($educationalProgram->name) ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</table>
	</div>
	<div>
		<span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> – <span class="calculated">[[page_nb]] c.</span>
	</div>

	<table class="approved-table">
		<tr>
			<th class="approved-first-col"></th>
			<th class="approved-second-col">Посада<br>Протокол засідання</th>
			<th class="approved-third-col">ПІБ</th>
			<th class="approved-forth-col">Підпис</th>
		</tr>
		<?php if (!empty($details->createdByPersons)): ?>
			<?php foreach ($details->createdByPersons as $idx => $createdByPerson): ?>
				<?php if ($idx === 0): ?>
					<tr>
						<th class="approved-first-col" rowspan="<?= htmlspecialchars(count($details->createdByPersons)) ?>">Розроблено</th>
						<td class="approved-second-col none-border-left inserted"><?= $createdByPerson->positionAndMinutesOfMeeting; ?></td>
						<td class="approved-third-col inserted center"><?= htmlspecialchars($createdByPerson->name) ?> <?= htmlspecialchars(mb_strtoupper($createdByPerson->surname, 'UTF-8')) ?>,<br><?= htmlspecialchars($createdByPerson->degree) ?>, <?= htmlspecialchars($createdByPerson->workPosition) ?></td>
						<td class="approved-forth-col"></td>
					</tr>
				<?php else: ?>
					<tr>
						<td class="approved-second-col none-border-left inserted"><?= $createdByPerson->positionAndMinutesOfMeeting; ?></td>
						<td class="approved-third-col inserted center"><?= htmlspecialchars($createdByPerson->name) ?> <?= htmlspecialchars(mb_strtoupper($createdByPerson->surname, 'UTF-8')) ?>,<br><?= htmlspecialchars($createdByPerson->degree ?? '') ?>, <?= htmlspecialchars($createdByPerson->workPosition ?? '') ?></td>
						<td class="approved-forth-col"></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<tr>
			<th rowspan="3" class="approved-first-col">Схвалено</th>
			<?php if (isset($details->educationalProgramGuarantor)): ?>
				<td class="approved-second-col inserted"><?= isset($details->educationalProgramGuarantor) ? $details->educationalProgramGuarantor->positionAndMinutesOfMeeting : '' ?></td>
				<td class="approved-third-col inserted center"><?= htmlspecialchars($details->educationalProgramGuarantor->name) ?> <?= htmlspecialchars(mb_strtoupper($details->educationalProgramGuarantor->surname, 'UTF-8')) ?>,<br><?= htmlspecialchars($details->educationalProgramGuarantor->degree ?? '') ?>, <?= htmlspecialchars($details->educationalProgramGuarantor->workPosition ?? '') ?></td>
			<?php else: ?>
				<td class="approved-second-col"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<?php if (isset($details->headOfDepartment)): ?>
				<td class="approved-second-col none-border-left inserted"><?= isset($details->headOfDepartment) ? $details->headOfDepartment->positionAndMinutesOfMeeting : '' ?></td>
				<td class="approved-third-col inserted center"><?= htmlspecialchars($details->headOfDepartment->name) ?> <?= htmlspecialchars(mb_strtoupper($details->headOfDepartment->surname, 'UTF-8')) ?>,<br><?= htmlspecialchars($details->headOfDepartment->degree ?? '') ?>, <?= htmlspecialchars($details->headOfDepartment->workPosition ?? '') ?></td>
			<?php else: ?>
				<td class="approved-second-col"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<?php if (isset($details->headOfCommission)): ?>
				<td class="approved-second-col none-border-left inserted"><?= isset($details->headOfCommission) ? $details->headOfCommission->positionAndMinutesOfMeeting : '' ?></td>
				<td class="approved-third-col inserted center"><?= htmlspecialchars($details->headOfCommission->name) ?> <?= htmlspecialchars(mb_strtoupper($details->headOfCommission->surname, 'UTF-8')) ?>,<br><?= htmlspecialchars($details->headOfCommission->degree ?? '') ?>, <?= htmlspecialchars($details->headOfCommission->workPosition ?? '') ?></td>
			<?php else: ?>
				<td class="approved-second-col"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<th class="approved-first-col">Затверджено</th>
			<?php if (isset($details->approvedBy)): ?>
				<td class="approved-second-col inserted"><?= isset($details->approvedBy) ? $details->approvedBy->positionAndMinutesOfMeeting : '' ?></td>
				<td class="approved-third-col inserted center"><?= htmlspecialchars($details->approvedBy->name) ?> <?= htmlspecialchars(mb_strtoupper($details->approvedBy->surname, 'UTF-8')) ?>,<br><?= htmlspecialchars($details->approvedBy->degree ?? '') ?>, <?= htmlspecialchars($details->approvedBy->workPosition ?? '') ?></td>
			<?php else: ?>
				<td class="approved-second-col"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
	</table>
</page>