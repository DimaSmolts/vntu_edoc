const slidesContainer = document.getElementById("carousel-container");
const lessonsAndHoursInfoSlideSlides = document.getElementById("lessonsAndHoursInfoSlide");
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

const slideObserverCallback = (entries) => {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			getThemesForEducationalDisciplineStructure();
		}
	});
};

const observer = new IntersectionObserver(slideObserverCallback, observerOptions);
observer.observe(lessonsAndHoursInfoSlideSlides);
