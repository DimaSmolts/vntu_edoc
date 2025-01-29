<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<page_footer>
		<div class="center" style="position: absolute; bottom: 10mm; width: 100%;">
			[[page_cu]]
		</div>
	</page_footer>
	<p class="justify">Робоча програма навчальної дисципліни <span class="span inserted">«<?= htmlspecialchars($details->disciplineName) ?>»</span></p>
	<div>
		<b>рівень вищої освіти</b> – <span class="inserted">
			<?= htmlspecialchars($details->stydingLevel->name ?? '') ?>
		</span>
	</div>
	<div class="basic-info">
		<?php
		$fieldsOfStudy = $details->fieldsOfStudy;
		$firstFieldOfStudy = array_shift($fieldsOfStudy);
		?>
		<table class="table-without-borders" style="width: 100%">
			<tr>
				<th style="width: 18%">галузь знань:</th>
				<td style="width: 82%">
					<span class="inserted"><?= htmlspecialchars($firstFieldOfStudy->name ?? '') ?></span>
				</td>
			</tr>
			<?php if (!empty($fieldsOfStudy)): ?>
				<?php foreach ($fieldsOfStudy as $fieldOfStudy): ?>
					<tr>
						<td style="width: 18%"></td>
						<td style="width: 82%">
							<span class="inserted"><?= htmlspecialchars($fieldOfStudy->name) ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</table>
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
					<span class="inserted"><?= htmlspecialchars($firstSpecialty->code ?? '') ?> <?= htmlspecialchars($firstSpecialty->name ?? '') ?></span>
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
					<span class="inserted"><?= htmlspecialchars($firstEducationalProgram->name ?? '') ?></span>
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
						<td class="approved-second-col none-border-left"><span class="inserted"><?= htmlspecialchars($createdByPerson->position ?? '') ?></span></td>
						<td class="approved-third-col center"><span class="inserted"><?= htmlspecialchars($createdByPerson->name) ?> <?= htmlspecialchars(mb_strtoupper($createdByPerson->surname, 'UTF-8')) ?></span>,<br><span class="inserted"><?= htmlspecialchars($createdByPerson->degree ?? '') ?></span>, <span class="inserted"><?= htmlspecialchars($createdByPerson->workPosition) ?></span></td>
						<td class="approved-forth-col"></td>
					</tr>
				<?php else: ?>
					<tr>
						<td class="approved-second-col none-border-left"><span class="inserted"><?= htmlspecialchars($createdByPerson->position ?? '') ?></span></td>
						<td class="approved-third-col center"><span class="inserted"><?= htmlspecialchars($createdByPerson->name) ?> <?= htmlspecialchars(mb_strtoupper($createdByPerson->surname, 'UTF-8')) ?></span>,<br><span class="inserted"><?= htmlspecialchars($createdByPerson->degree ?? '') ?></span>, <span class="inserted"><?= htmlspecialchars($createdByPerson->workPosition ?? '') ?></span></td>
						<td class="approved-forth-col"></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<tr>
			<th rowspan="3" class="approved-first-col">Схвалено</th>
			<?php if (isset($details->educationalProgramGuarantor)): ?>
				<td class="approved-second-col"><span class="inserted"><?= htmlspecialchars($details->educationalProgramGuarantor->position ?? '') ?></span></td>
				<td class="approved-third-col center"><span class="inserted"><?= htmlspecialchars($details->educationalProgramGuarantor->name) ?> <?= htmlspecialchars(mb_strtoupper($details->educationalProgramGuarantor->surname, 'UTF-8')) ?></span>,<br><span class="inserted"><?= htmlspecialchars($details->educationalProgramGuarantor->degree ?? '') ?></span>, <span class="inserted"><?= htmlspecialchars($details->educationalProgramGuarantor->workPosition ?? '') ?></span></td>
			<?php else: ?>
				<td class="approved-second-col"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<?php if (isset($details->headOfDepartment)): ?>
				<td class="approved-second-col none-border-left"><span class="inserted"><?= htmlspecialchars($details->headOfDepartment->position ?? '') ?></span><br><br><span class="inserted"><?= htmlspecialchars($details->headOfDepartment->minutesOfMeeting ?? '') ?></span><br>(протокол №___ від ____ 20__ р.)</td>
				<td class="approved-third-col center"><span class="inserted"><?= htmlspecialchars($details->headOfDepartment->name) ?> <?= htmlspecialchars(mb_strtoupper($details->headOfDepartment->surname, 'UTF-8')) ?></span>,<br><span class="inserted"><?= htmlspecialchars($details->headOfDepartment->degree ?? '') ?></span>, <span class="inserted"><?= htmlspecialchars($details->headOfDepartment->workPosition ?? '') ?></span></td>
			<?php else: ?>
				<td class="approved-second-col none-border-left"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<?php if (isset($details->headOfCommission)): ?>
				<td class="approved-second-col none-border-left"><span class="inserted"><?= htmlspecialchars($details->headOfCommission->position ?? '')  ?></span><br><br><span class="inserted"><?= htmlspecialchars($details->headOfCommission->minutesOfMeeting ?? '')  ?></span><br>(протокол №___ від ____ 20__ р.)</td>
				<td class="approved-third-col center"><span class="inserted"><?= htmlspecialchars($details->headOfCommission->name) ?> <?= htmlspecialchars(mb_strtoupper($details->headOfCommission->surname, 'UTF-8')) ?></span>,<br><span class="inserted"><?= htmlspecialchars($details->headOfCommission->degree ?? '') ?></span>, <span class="inserted"><?= htmlspecialchars($details->headOfCommission->workPosition ?? '') ?></span></td>
			<?php else: ?>
				<td class="approved-second-col none-border-left"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
		<tr>
			<th class="approved-first-col">Затверджено</th>
			<?php if (isset($details->approvedBy)): ?>
				<td class="approved-second-col"><span class="inserted"><?= htmlspecialchars($details->approvedBy->position ?? '') ?></span><br><br><span class="inserted"><?= htmlspecialchars($details->approvedBy->minutesOfMeeting ?? '') ?></span><br>(протокол №___ від ____ 20__ р.)</td>
				<td class="approved-third-col center"><span class="inserted"><?= htmlspecialchars($details->approvedBy->name) ?> <?= htmlspecialchars(mb_strtoupper($details->approvedBy->surname, 'UTF-8')) ?></span>,<br><span class="inserted"><?= htmlspecialchars($details->approvedBy->degree ?? '') ?></span>, <span class="inserted"><?= htmlspecialchars($details->approvedBy->workPosition ?? '') ?></span></td>
			<?php else: ?>
				<td class="approved-second-col"></td>
				<td class="approved-third-col"></td>
			<?php endif; ?>
			<td class="approved-forth-col"></td>
		</tr>
	</table>
	<p style='color: white'>.</p>
<p style='color: white'>.</p>

<?php if (!empty($details->createdByPersons)): ?>
	<?php foreach ($details->createdByPersons as $createdByPerson): ?>
		<?php
		$copyrightPersonNameLetter = "";
		$copyrightPersonPatronymicNameLetter = "";

		if (isset($createdByPerson)) {
			$copyrightPersonNameLetter = mb_substr($createdByPerson->name, 0, 1);
			$copyrightPersonPatronymicNameLetter = mb_substr($createdByPerson->patronymicName, 0, 1);
		}
		?>
		<?php if (isset($createdByPerson)): ?>
			<p class="copyright copyright-name">© <span class="inserted"><?= htmlspecialchars($copyrightPersonNameLetter) ?>. <?= htmlspecialchars($copyrightPersonPatronymicNameLetter) ?>. <?= htmlspecialchars($createdByPerson->surname) ?></span>, <span
					class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?>.</span></p>
		<?php else: ?>
			<p class="copyright copyright-name">© <span class="inserted">. .</span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?>.</span></p>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

<p class="copyright">© <span class="global"><?= htmlspecialchars($details->globalData->universityShortName) ?></span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> рік</p>
</page>