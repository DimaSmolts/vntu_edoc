const deleteAdditionalTask = (typeId, semesterId) => {
	makeDeleteRequest({
		linkWithParams: `api/deleteIndividualTask?semesterId=${semesterId}&typeId=${typeId}`
	})
}