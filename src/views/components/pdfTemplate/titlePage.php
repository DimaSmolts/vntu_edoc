<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<div style="height: 100%; position: relative;">
		<div class="center global"><?= htmlspecialchars($details->globalData->universityName) ?></div>
		<div class="center inserted"><?= isset($details->facultyId) ? htmlspecialchars($details->faculty->name) : '' ?></div>
		<div class="center inserted small-bottom-margin"><?= isset($details->departmentId) ? htmlspecialchars($details->department->name) : '' ?></div>
		<div class="doc-approved-block">
			<div class="center bold">ЗАТВЕРДЖУЮ</div>
			<div class="inserted justify"><?= htmlspecialchars($details->docApprovedBy->position ?? '') ?></div>
			<div>________ <span class="inserted"><?= htmlspecialchars($details->docApprovedBy->name) ?> <?= htmlspecialchars(mb_strtoupper($details->docApprovedBy->surname, 'UTF-8')) ?></span></div>
			<div>«___»______________ <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> року</div>
		</div>

		<div class="center">
			<img src="src/images/logo.png" style="width: 60mm" alt="logo">
		</div>

		<div class="center">РОБОЧА ПРОГРАМА НАВЧАЛЬНОЇ ДИСЦИПЛІНИ</div>
		<div class="center inserted uppercase bold"><?= htmlspecialchars($details->disciplineName) ?></div>
		<div class="center title-placeholder small-bottom-margin">(шифр і назва навчальної дисципліни)</div>

		<div class="basic-info">
			<b class="basic-info-name">рівень вищої освіти</b>: <span class="inserted"><?= htmlspecialchars($details->stydingLevelId) ?></span>
		</div>
		<div class="basic-info">
			<b class="basic-info-name">галузь знань</b>: <span class="inserted"><?= htmlspecialchars($details->fielfOfStudyName) ?></span>
		</div>
		<div class="basic-info">
			<?php
			$specialties = $details->specialties;
			$firstSpecialty = array_shift($specialties);
			?>
			<table class="table-without-borders" style="width: 100%">
				<tr>
					<th style="width: 18%">спеціальність:</th>
					<td style="width: 82%">
						<span class="inserted"><?= htmlspecialchars($firstSpecialty->code ?? '') ?> <?= htmlspecialchars($firstSpecialty->name ?? '') ?></span>
					</td>
				</tr>
				<?php if (!empty($specialties)): ?>
					<?php foreach ($specialties as $specialty): ?>
						<tr>
							<td style="width: 18%"></td>
							<td style="width: 82%">
								<span class="inserted"><?= htmlspecialchars($specialty->code) ?> <?= htmlspecialchars($specialty->name) ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
		<div class="basic-info small-bottom-margin">
			<?php
			$educationalPrograms = $details->educationalPrograms;
			$firstEducationalProgram = array_shift($educationalPrograms);
			?>
			<table class="table-without-borders" style="width: 100%">
				<tr>
					<th style="width: 23%">освітня програма:</th>
					<td style="width: 78%">
						<span class="inserted"><?= htmlspecialchars($firstEducationalProgram->name ?? '') ?></span>
					</td>
				</tr>
				<?php if (!empty($educationalPrograms)): ?>
					<?php foreach ($educationalPrograms as $educationalProgram): ?>
						<tr>
							<td style="width: 23%"></td>
							<td style="width: 78%">
								<span class="inserted"><?= htmlspecialchars($educationalProgram->name) ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
		<div class="center inserted bold"><?= htmlspecialchars($details->code) ?></div>

		<page_footer>
			<div class="center" style="position: absolute; bottom: 15mm; width: 100%;">
				<span class="global"><?= htmlspecialchars($details->globalData->universityShortName) ?></span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span>
			</div>
		</page_footer>
	</div>
</page>