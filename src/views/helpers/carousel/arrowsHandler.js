const slidesContainer = document.getElementById("wpDetailsCarouselContainer");
const slides = document.querySelectorAll(".slide");
const prevButton = document.getElementById("carousel-arrow-prev");
const nextButton = document.getElementById("carousel-arrow-next");

let currentIndex = 0; // Track the current slide index

// Update the carousel to align the visible slide
const updateSlidePosition = () => {
	console.log(currentIndex);
	const slideWidth = slides[0].clientWidth; // Get the width of a single slide
	slidesContainer.scrollTo({
		left: currentIndex * slideWidth,
		behavior: "smooth", // Smooth scrolling
	});
	updateButtonState();
};

// Enable/Disable navigation buttons based on the current index
const updateButtonState = () => {
	const updatedSlides = document.querySelectorAll(".slide");
	prevButton.disabled = currentIndex === 0;
	nextButton.disabled = currentIndex === updatedSlides.length - 1;
};

// Move to the next slide
nextButton.addEventListener("click", () => {
	const updatedSlides = document.querySelectorAll(".slide");
	if (currentIndex < updatedSlides.length - 1) {
		currentIndex++;
		updateSlidePosition();
	}
});

// Move to the previous slide
prevButton.addEventListener("click", () => {
	if (currentIndex > 0) {
		currentIndex--;
		updateSlidePosition();
	}
});

// Initial state of buttons
updateButtonState();

const goToSlide = (slideNumber, targetElement) => {
	const updatedSlides = document.querySelectorAll(".slide");

	// Ensure the slide number is within the valid range
	if (slideNumber >= 0 && slideNumber < updatedSlides.length) {

		if (slideNumber === getSlideNumberByName('pointDistribution')) {
			// отримуємо всі дані для розподілу балів оцінювання знань  з окремих видів роботи та в цілому по модулях (в балах)
			getPointsDistributionSlide();
		}

		currentIndex = slideNumber;
		updateSlidePosition();

		// Focus on the input if the ID is provided
		if (targetElement) {
			targetElement.focus();
		}
	}
};

const goToSlideIncludeAssessmentComponentSlide = async (slideNumber) => {
	const courseworksAndProjectsInfoSlide = document.getElementById('courseworksAndProjectsInfoSlide');

	if (!courseworksAndProjectsInfoSlide) {
		// перевіряємо чи є курсовий та рендеримо наступний слайд про курсовий
		await getCourseworkSlide();
	}

	const updatedSlides = document.querySelectorAll(".slide");

	// Ensure the slide number is within the valid range
	if (slideNumber >= 0 && slideNumber < updatedSlides.length) {
		currentIndex = slideNumber;

		updateSlidePosition();
	}
};

// додаємо функції які слідкують за перегортанням певних слайдів
const observerOptions = {
	root: document.getElementById("carouselWrapper"),
	threshold: 0.5,
};

const educationalDisciplineSemesterControlMethodsSlide = document.getElementById("educationalDisciplineSemesterControlMethodsSlide");

const educationalDisciplineSemesterControlMethodsSlideObserverCallback = (entries) => {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			// отримуємо всі семестри з модулями
			getEducationalDisciplineSemesterControlMethodsSlide();
		}
	});
};

const educationalDisciplineSemesterControlMethodsSlideObserver = new IntersectionObserver(educationalDisciplineSemesterControlMethodsSlideObserverCallback, observerOptions);
educationalDisciplineSemesterControlMethodsSlideObserver.observe(educationalDisciplineSemesterControlMethodsSlide);

const selfworkSlide = document.getElementById("selfworkSlide");

const selfworkSlideObserverCallback = (entries) => {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			// отримуємо необхідну інформацію для самостійної роботи
			getSelfworkSlide();
		}
	});
};

const selfworkSlideObserver = new IntersectionObserver(selfworkSlideObserverCallback, observerOptions);
selfworkSlideObserver.observe(selfworkSlide);

const educationalDisciplineStructureSlide = document.getElementById("educationalDisciplineStructureSlide");

const educationalDisciplineStructureSlideObserverCallback = (entries) => {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			// отримуємо всі теми з уроками до тем
			getThemesForEducationalDisciplineStructure();

			// перевіряємо чи є курсовий та рендеримо наступний слайдм про курсовий
			getCourseworkSlide();

			// отримуємо всі дані для розподілу балів оцінювання знань  з окремих видів роботи та в цілому по модулях (в балах)
			getPointsDistributionSlide();
		}
	});
};

const educationalDisciplineStructureSlideObserver = new IntersectionObserver(educationalDisciplineStructureSlideObserverCallback, observerOptions);
educationalDisciplineStructureSlideObserver.observe(educationalDisciplineStructureSlide);

const generalAssessmentCriteriaSlide = document.getElementById("generalAssessmentCriteriaSlide");

const generalAssessmentCriteriaSlideObserverCallback = (entries) => {
	entries.forEach(async (entry) => {
		if (entry.isIntersecting) {
			await getStructureForAssessmentCriteriasSlides();

			updateButtonState();
		}
	});
};

const generalAssessmentCriteriaSlideObserver = new IntersectionObserver(generalAssessmentCriteriaSlideObserverCallback, observerOptions);
generalAssessmentCriteriaSlideObserver.observe(generalAssessmentCriteriaSlide);
