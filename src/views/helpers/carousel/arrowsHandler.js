const slidesContainer = document.getElementById("wpDetailsCarouselContainer");
const slide = document.querySelector(".slide");
const prevButton = document.getElementById("carousel-arrow-prev");
const nextButton = document.getElementById("carousel-arrow-next");

nextButton.addEventListener("click", () => {
	const slideWidth = slide.clientWidth;
	slidesContainer.scrollLeft += slideWidth;
});

prevButton.addEventListener("click", () => {
	const slideWidth = slide.clientWidth;
	slidesContainer.scrollLeft -= slideWidth;
});

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
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			getStructureForAssessmentCriteriasSlides()
		}
	});
};

const generalAssessmentCriteriaSlideObserverObserverbserver = new IntersectionObserver(generalAssessmentCriteriaSlideObserverCallback, observerOptions);
generalAssessmentCriteriaSlideObserverObserverbserver.observe(generalAssessmentCriteriaSlide);
