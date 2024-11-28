const addAssessmentCriteriasSlides = ({
	structure,
	practicalSlideContent,
	labSlideContent,
	seminarSlideContent
}) => {
	const carouselContainer = document.getElementById('wpDetailsCarouselContainer');

	if (structure.isPracticalsExist) {
		const practicalSlide = createAssessmentCriteriasSlide(practicalSlideContent);

		carouselContainer.appendChild(practicalSlide);
	}

	if (structure.isLabsExist) {
		const labSlide = createAssessmentCriteriasSlide(labSlideContent);

		carouselContainer.appendChild(labSlide);
	}

	if (structure.isSeminarsExist) {
		const seminarSlide = createAssessmentCriteriasSlide(seminarSlideContent);

		carouselContainer.appendChild(seminarSlide);
	}
}

const createAssessmentCriteriasSlide = (page) => {
	return createElement({
		elementName: 'li',
		classList: ['slide'],
		innerHTML: page
	})
}

