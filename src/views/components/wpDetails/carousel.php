<div class="carousel-wrapper" id="carousel-wrapper">
	<ul class="carousel-container" id="carousel-container">
		<li class="slide">
			<?php include __DIR__ . '/generalUnivercityInfoSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/approvedPageInfoSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/prerequisitesAndGoal.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/educationalDisciplineSemesterProgramSlide.php'; ?>
		</li>
		<li class="slide" id="lessonsAndHoursInfoSlide">
			<?php include __DIR__ . '/lessonsAndHoursInfoSlide.php'; ?>
		</li>
	</ul>
	<div class="carousel-arrow-container">
		<button class="carousel-arrow" id="carousel-arrow-prev">
			Назад
		</button>
		<div>
			<a class="btn" type="button" href="pdf?id=<?= htmlspecialchars($details->id) ?>">Згенерувати PDF</a>
		</div>
		<button class="carousel-arrow" id="carousel-arrow-next">
			Далі
		</button>
	</div>
</div>