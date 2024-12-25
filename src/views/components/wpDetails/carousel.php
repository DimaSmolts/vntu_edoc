<div class="carousel-wrapper" id="carouselWrapper">
	<ul class="carousel-container" id="wpDetailsCarouselContainer">
		<li class="slide">
			<?php include __DIR__ . '/generalInfoSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/approvedPageInfoSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/prerequisitesAndGoalSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/educationalDisciplineSemesterProgramSlide.php'; ?>
		</li>
		<li class="slide" id="educationalDisciplineSemesterControlMethodsSlide">
			<?php include __DIR__ . '/educationalDisciplineSemesterControlMethodsSlide.php'; ?>
		</li>
		<li class="slide" id="educationalDisciplineStructureSlide">
			<?php include __DIR__ . '/educationalDisciplineStructureSlide.php'; ?>
		</li>
		<li class="slide" id="pointsDistributionSlide">
			<?php include __DIR__ . '/pointsDistributionSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/studingAndExamingMethodsSlide.php'; ?>
		</li>
		<li class="slide">
			<?php include __DIR__ . '/literatureSlide.php'; ?>
		</li>
		<li class="slide" id="generalAssessmentCriteriaSlide">
			<?php include __DIR__ . '/generalAssessmentCriteriaSlide.php'; ?>
		</li>
	</ul>
	<div class="carousel-arrow-container">
		<button class="carousel-arrow" id="carousel-arrow-prev">
			Назад
		</button>
		<div>
			<a class="btn" type="button" href="pdf?id=<?= htmlspecialchars($details->id) ?>" target="_blank">Згенерувати PDF</a>
		</div>
		<button class="carousel-arrow" id="carousel-arrow-next">
			Далі
		</button>
	</div>
</div>