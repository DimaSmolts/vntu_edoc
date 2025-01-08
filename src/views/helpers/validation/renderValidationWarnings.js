const renderValidationWarnings = () => {
	const validationEntries = Array.from(validationMap);
	const invalidTitleBlock = document.getElementById('invalidTitleBlock');
	const validTitleBlock = document.getElementById('validTitleBlock');

	if (validationEntries.length > 0) {
		validTitleBlock.style.display = 'none';
		invalidTitleBlock.style.display = 'block';
	} else {
		invalidTitleBlock.style.display = 'none';
		validTitleBlock.style.display = 'block';
	}

	const selfworkValidationGroup = document.getElementById('selfworkValidationGroup');
	const selfworkValidationMessages = selfworkValidationGroup.childNodes;

	const validationEntriesIds = validationEntries.map(([elementId]) => elementId);

	const currentWarningMessagesIds = Array.from(selfworkValidationMessages)
		.map(node => node.id);

	const messagesIdsToCreate = validationEntriesIds.filter(id => !currentWarningMessagesIds.includes(id));
	const messagesIdsToRemove = currentWarningMessagesIds.filter(id => !validationEntriesIds.includes(id));

	validationEntries.forEach(([elementId, { group, message }]) => {
		if (messagesIdsToCreate.includes(elementId)) {
			const validationMessageBlock = createElement({
				elementName: 'p',
				id: elementId,
				innerText: message,
			})
			const validationGroup = document.getElementById(group);

			validationGroup.appendChild(validationMessageBlock);
		}
	})

	messagesIdsToRemove.forEach(elementId => {
		const messageToRemove = document.getElementById(elementId);

		messageToRemove.remove();
	})
}