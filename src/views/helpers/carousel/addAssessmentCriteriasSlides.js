const addAssessmentCriteriasSlides = ({
	structure,
	practicalSlideContent,
	labSlideContent,
	seminarSlideContent,
	courseworkSlideContent,
	courseProjectSlideContent,
	calculationAndGraphicWorkSlideContent,
	calculationAndGraphicTaskSlideContent,
	additionalTasksSlidesContent,
	colloquiumSlideContent,
	controlWorkSlideContent,
}) => {
	const carouselContainer = document.getElementById('wpDetailsCarouselContainer');

	if (structure.isPracticalsExist) {
		const practicalAssessmentCriteriasSlide = document.getElementById('practicalAssessmentCriteriasSlide');

		if (practicalAssessmentCriteriasSlide) {
			practicalAssessmentCriteriasSlide.remove();
		}

		const practicalSlide = createSlide(practicalSlideContent, 'practicalAssessmentCriteriasSlide');

		carouselContainer.appendChild(practicalSlide);
	}

	if (structure.isLabsExist) {
		const labAssessmentCriteriasSlide = document.getElementById('labAssessmentCriteriasSlide');

		if (labAssessmentCriteriasSlide) {
			labAssessmentCriteriasSlide.remove();
		}

		const labSlide = createSlide(labSlideContent, 'labAssessmentCriteriasSlide');

		carouselContainer.appendChild(labSlide);
	}

	if (structure.isSeminarsExist) {
		const seminarAssessmentCriteriasSlide = document.getElementById('seminarAssessmentCriteriasSlide');

		if (seminarAssessmentCriteriasSlide) {
			seminarAssessmentCriteriasSlide.remove();
		}

		const seminarSlide = createSlide(seminarSlideContent, 'seminarAssessmentCriteriasSlide');

		carouselContainer.appendChild(seminarSlide);
	}

	if (structure.isCourseworkExists) {
		const courseworkAssessmentCriteriasSlide = document.getElementById('courseworkAssessmentCriteriasSlide');

		if (courseworkAssessmentCriteriasSlide) {
			courseworkAssessmentCriteriasSlide.remove();
		}

		const courseworkSlide = createSlide(courseworkSlideContent, 'courseworkAssessmentCriteriasSlide');

		carouselContainer.appendChild(courseworkSlide);
	}

	if (structure.isCourseProjectExists) {
		const courseProjectAssessmentCriteriasSlide = document.getElementById('courseProjectAssessmentCriteriasSlide');

		if (courseProjectAssessmentCriteriasSlide) {
			courseProjectAssessmentCriteriasSlide.remove();
		}

		const courseProjectSlide = createSlide(courseProjectSlideContent, 'courseProjectAssessmentCriteriasSlide');

		carouselContainer.appendChild(courseProjectSlide);
	}

	if (structure.isCalculationAndGraphicWorkExists) {
		const calculationAndGraphicWorkAssessmentCriteriasSlide = document.getElementById('calculationAndGraphicWorkAssessmentCriteriasSlide');

		if (calculationAndGraphicWorkAssessmentCriteriasSlide) {
			calculationAndGraphicWorkAssessmentCriteriasSlide.remove();
		}

		const calculationAndGraphicWorkSlide = createSlide(calculationAndGraphicWorkSlideContent, 'calculationAndGraphicWorkAssessmentCriteriasSlide');

		carouselContainer.appendChild(calculationAndGraphicWorkSlide);
	}

	if (structure.isCalculationAndGraphicTaskExists) {
		const calculationAndGraphicTaskAssessmentCriteriasSlide = document.getElementById('calculationAndGraphicTaskAssessmentCriteriasSlide');

		if (calculationAndGraphicTaskAssessmentCriteriasSlide) {
			calculationAndGraphicTaskAssessmentCriteriasSlide.remove();
		}

		const calculationAndGraphicTaskSlide = createSlide(calculationAndGraphicTaskSlideContent, 'calculationAndGraphicTaskAssessmentCriteriasSlide');

		carouselContainer.appendChild(calculationAndGraphicTaskSlide);
	}

	if (structure.isAdditionalTasksExist) {
		Object.entries(additionalTasksSlidesContent).forEach(([name, additionalTaskSlideContent]) => {
			const additionalTaskAssessmentCriteriasSlide = document.getElementById(`additionalTask${name}AssessmentCriteriasSlide`);

			if (additionalTaskAssessmentCriteriasSlide) {
				additionalTaskAssessmentCriteriasSlide.remove();
			}

			const additionalTaskSlide = createSlide(additionalTaskSlideContent, `additionalTask${name}AssessmentCriteriasSlide`);

			carouselContainer.appendChild(additionalTaskSlide);
		});
	}

	if (structure.isColloquiumExists) {
		const colloquiumAssessmentCriteriasSlide = document.getElementById('colloquiumAssessmentCriteriasSlide');

		if (colloquiumAssessmentCriteriasSlide) {
			colloquiumAssessmentCriteriasSlide.remove();
		}

		const colloquiumSlide = createSlide(colloquiumSlideContent, 'colloquiumAssessmentCriteriasSlide');

		carouselContainer.appendChild(colloquiumSlide);
	}

	if (structure.isControlWorkExists) {
		const controlWorkAssessmentCriteriasSlide = document.getElementById('controlWorkAssessmentCriteriasSlide');

		if (controlWorkAssessmentCriteriasSlide) {
			controlWorkAssessmentCriteriasSlide.remove();
		}

		const controlWorkSlide = createSlide(controlWorkSlideContent, 'controlWorkAssessmentCriteriasSlide');

		carouselContainer.appendChild(controlWorkSlide);
	}
}


