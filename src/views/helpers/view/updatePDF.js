const updatePDF = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const embedElement = document.getElementById('pdfPreview');
	const originalSrc = embedElement.getAttribute('src');

	// Append a unique query parameter to force refresh
	const uniqueParam = new Date().getTime(); // or use Math.random() for a random value
	const newSrc = originalSrc.split('?')[0] + `?id=${wpId}&cache=` + uniqueParam + '#view=FitH';

	await embedElement.setAttribute('src', newSrc);
}