<page backtop="20mm" backbottom="20mm" backleft="25mm" backright="10mm">
	<div class="center global"><?= htmlspecialchars($details->globalData->universityName) ?></div>
	<div class="center inserted"><?= isset($details->facultyId) ? htmlspecialchars($details->faculty->name) : '' ?></div>
	<div class="center inserted small-bottom-margin"><?= isset($details->departmentId) ? htmlspecialchars($details->department->name) : '' ?></div>
	<div class="right ">ЗАТВЕРДЖУЮ</div>
	<div class="approved-position-container change">
		<div class="right approved-position">Проректор з науково-педагогічної роботи та організації освітнього процесу</div>
	</div>
	<div class="right">__________ <span class="change">Олександр ПЕТРОВ</span></div>
	<div class="right">"___"____________ <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span> року</div>
	<div class="center">
		<img src="src/images/logo.png" style="width: 60mm" alt="logo">
	</div>

	<div class="center">РОБОЧА ПРОГРАМА НАВЧАЛЬНОЇ ДИСЦИПЛІНИ</div>
	<div class="center inserted uppercase bold"><?= htmlspecialchars($details->disciplineName) ?></div>
	<div class="center title-placeholder small-bottom-margin">(шифр і назва навчальної дисципліни)</div>

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
		<b class="basic-info-name">спеціальність</b>: <u class="basic-info-value"><span class="not-inserted">
				<?= htmlspecialchars($details->specialtyIdx) ?>
			</span> – <span class="inserted">
				<?= htmlspecialchars($details->specialtyName) ?>
			</span>
		</u>
	</div>
	<div class="basic-info small-bottom-margin">
		<b class="basic-info-name">освітня програма</b>: <u class="basic-info-value inserted"><?= htmlspecialchars($details->educationalProgram) ?></u>
	</div>
	<div class="center inserted large-bottom-margin bold"><?= htmlspecialchars($details->code) ?></div>
	<div class="center"><span class="global"><?= htmlspecialchars($details->globalData->universityShortName) ?></span>, <span class="inserted"><?= isset($details->regularYear) ? htmlspecialchars($details->regularYear) : '' ?></span></div>
</page>