const slidesContainer = document.getElementById("carousel-container");
const educationalDisciplineStructureSlide = document.getElementById("educationalDisciplineStructureSlide");
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

const observerOptions = {
	root: document.getElementById("carousel-wrapper"),
	threshold: 0.5,
};

const educationalDisciplineStructureSlideObserverCallback = (entries) => {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			getThemesForEducationalDisciplineStructure();
		}
	});
};

const educationalDisciplineStructureSlideObserverObserverbserver = new IntersectionObserver(educationalDisciplineStructureSlideObserverCallback, observerOptions);
educationalDisciplineStructureSlideObserverObserverbserver.observe(educationalDisciplineStructureSlide);
