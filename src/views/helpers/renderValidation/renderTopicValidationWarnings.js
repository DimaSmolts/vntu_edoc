const renderTopicValidationWarnings = ({
	validationEntries,
	titleBlock,
	validationGroupBlock
}) => {
	if (!validationEntries) {
		titleBlock.style.display = 'none';
		validationGroupBlock.innerText = '';
		return;
	}

	titleBlock.style.display = 'block';

	const existingValidationMessages = validationGroupBlock.childNodes;

	const validationEntriesIds = validationEntries.map(({ elementId }) => elementId);
	const validationEntriesMessages = validationEntries.map(({ elementId, message }) => {
		return { id: elementId, message }
	});

	const existingWarningMessagesIds = Array.from(existingValidationMessages)
		.map(node => node.id);

	const existingWarningMessages = Array.from(existingValidationMessages)
		.map(node => {
			return {
				id: node.id,
				message: node.innerText
			}
		});

	const messagesIdsToCreate = validationEntriesIds.filter(id => !existingWarningMessagesIds.includes(id));
	const messagesIdsToRemove = existingWarningMessagesIds.filter(id => !validationEntriesIds.includes(id));

	const messagesIdsToUpdate = existingWarningMessages.filter(({ id, message }) => {
		const validationEntriesMessage = validationEntriesMessages.find(({ id: validationEntriesMessageId }) => {
			return validationEntriesMessageId === id;
		})

		const isMessageUpdated = validationEntriesMessage?.message !== message;

		return isMessageUpdated;
	})?.map(({ id }) => id);

	validationEntries.forEach(({ elementId, message, slideNumber, targetElement }) => {
		if (messagesIdsToCreate.includes(elementId)) {
			const validationMessageBlock = createElement({
				elementName: 'p',
				id: elementId,
				innerText: message,
				eventListenerType: 'click',
				eventListener: () => {
					goToSlide(slideNumber, targetElement);
				}
			})

			validationGroupBlock.appendChild(validationMessageBlock);
		}
		if (messagesIdsToUpdate.includes(elementId)) {
			const messageToUpdate = document.getElementById(elementId);

			messageToUpdate.innerText = message;
		}
	})

	messagesIdsToRemove.forEach(elementId => {
		const messageToRemove = document.getElementById(elementId);

		messageToRemove.remove();
	})
}