const getSelfworkSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const response = await fetch(`api/getSelfworkContent/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})

	const data = await response.json();

	const selfworkContentContainer = document.getElementById('selfworkContent');
	selfworkContentContainer.innerHTML = data.selfworkContent;
}