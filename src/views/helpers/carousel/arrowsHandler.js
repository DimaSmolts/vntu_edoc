const slidesContainer = document.getElementById("wpDetailsCarouselContainer");
const slides = document.querySelectorAll(".slide");
const prevButton = document.getElementById("carousel-arrow-prev");
const nextButton = document.getElementById("carousel-arrow-next");

let currentIndex = 0; // Track the current slide index

// Update the carousel to align the visible slide
const updateSlidePosition = () => {
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

// додаємо функції які слідкують за перегортанням певних слайдів
const observerOptions = {
	root: document.getElementById("carouselWrapper"),
	threshold: 0.5,
};

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

const educationalDisciplineStructureSlideObserverObserverbserver = new IntersectionObserver(educationalDisciplineStructureSlideObserverCallback, observerOptions);
educationalDisciplineStructureSlideObserverObserverbserver.observe(educationalDisciplineStructureSlide);

const generalAssessmentCriteriaSlide = document.getElementById("generalAssessmentCriteriaSlide");

const generalAssessmentCriteriaSlideObserverCallback = (entries) => {
	entries.forEach(async (entry) => {
		if (entry.isIntersecting) {
			await getStructureForAssessmentCriteriasSlides();
			console.log('here')
			updateButtonState();
		}
	});
};

const generalAssessmentCriteriaSlideObserverObserverbserver = new IntersectionObserver(generalAssessmentCriteriaSlideObserverCallback, observerOptions);
generalAssessmentCriteriaSlideObserverObserverbserver.observe(generalAssessmentCriteriaSlide);
