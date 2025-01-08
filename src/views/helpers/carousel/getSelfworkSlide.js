const getSelfworkSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getSelfworkContent/?id=${wpId}`
	});

	const selfworkContentContainer = document.getElementById('selfworkContent');
	selfworkContentContainer.innerHTML = data.selfworkContent;
}