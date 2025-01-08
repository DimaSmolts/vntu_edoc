const renderTopicValidationWarnings = ({
	validationEntries,
	titleBlock,
	validationGroupBlock
}) => {
	if (validationEntries.length === 0) {
		titleBlock.style.display = 'none';
		return;
	}

	titleBlock.style.display = 'block';

	const existingValidationMessages = validationGroupBlock.childNodes;

	const validationEntriesIds = validationEntries.map(({ elementId }) => elementId);

	const existingWarningMessagesIds = Array.from(existingValidationMessages)
		.map(node => node.id);

	const messagesIdsToCreate = validationEntriesIds.filter(id => !existingWarningMessagesIds.includes(id));
	const messagesIdsToRemove = existingWarningMessagesIds.filter(id => !validationEntriesIds.includes(id));

	validationEntries.forEach(({ elementId, message }) => {
		if (messagesIdsToCreate.includes(elementId)) {
			const validationMessageBlock = createElement({
				elementName: 'p',
				id: elementId,
				innerText: message,
			})

			validationGroupBlock.appendChild(validationMessageBlock);
		}
	})

	messagesIdsToRemove.forEach(elementId => {
		const messageToRemove = document.getElementById(elementId);

		messageToRemove.remove();
	})
}