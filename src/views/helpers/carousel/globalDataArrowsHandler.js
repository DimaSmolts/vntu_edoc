const slidesContainer = document.getElementById("globalDataCarouselContainer");
const slides = document.querySelectorAll(".globalDataSlide");
const prevButton = document.getElementById("globalDataCarouselArrowPrev");
const nextButton = document.getElementById("globalDataCarouselArrowNext");

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
	prevButton.disabled = currentIndex === 0;
	nextButton.disabled = currentIndex === slides.length - 1;
};

// Move to the next slide
nextButton.addEventListener("click", () => {
	if (currentIndex < slides.length - 1) {
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
