const deleteAdditionalTask = (typeId, semesterId) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	makeDeleteRequest({
		linkWithParams: `api/deleteIndividualTask?semesterId=${semesterId}&typeId=${typeId}&wpId=${wpId}`
	})
}