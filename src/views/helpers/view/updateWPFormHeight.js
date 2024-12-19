function updateWPFormHeight() {
	const slides = document.querySelectorAll('.slide');
	const carouselArrowContainer = document.querySelector('.carousel-arrow-container');

	if (carouselArrowContainer && slides.length) {
		const viewportHeight = window.innerHeight;
		const carouselArrowHeight = carouselArrowContainer.offsetHeight;

		slides.forEach(slide => {
			const pageTitleContainer = slide.querySelector('.page-title-container');
			const wpForm = slide.querySelector('.wp-form');

			if (pageTitleContainer && wpForm) {
				const pageTitleHeight = pageTitleContainer.offsetHeight;
				const newHeight = viewportHeight - pageTitleHeight - carouselArrowHeight;
				wpForm.style.height = `${newHeight}px`;
			}
		});
	}
}

window.addEventListener('load', updateWPFormHeight);
window.addEventListener('resize', updateWPFormHeight);
