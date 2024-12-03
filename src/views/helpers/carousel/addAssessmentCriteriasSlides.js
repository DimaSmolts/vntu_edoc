const addAssessmentCriteriasSlides = ({
	structure,
	practicalSlideContent,
	labSlideContent,
	seminarSlideContent,
	courseworkSlideContent
}) => {
	const carouselContainer = document.getElementById('wpDetailsCarouselContainer');

	if (structure.isPracticalsExist) {
		const practicalSlide = createSlide(practicalSlideContent);

		carouselContainer.appendChild(practicalSlide);
	}

	if (structure.isLabsExist) {
		const labSlide = createSlide(labSlideContent);

		carouselContainer.appendChild(labSlide);
	}

	if (structure.isSeminarsExist) {
		const seminarSlide = createSlide(seminarSlideContent);

		carouselContainer.appendChild(seminarSlide);
	}

	if (structure.isCourseworkExists) {
		const courseworkSlide = createSlide(courseworkSlideContent);

		carouselContainer.appendChild(courseworkSlide);
	} 
}


