const addAssesmentComponentsInputs = (event, semesterId, taskTypeId) => {
	event.preventDefault();

	const container = document.getElementById(`assesmentComponents${semesterId}`);

	const addAssesmentComponent = document.getElementById(`addAssesmentComponent${semesterId}`);

	const assesmentComponentsInputs = createElement({ elementName: 'div', classList: ['assesment-components-inputs'] });

	const assesmentComponentName = createElement({
		elementName: 'input',
		type: 'text',
		name: 'assesmentComponentName',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateAssesmentComponents(e, semesterId, taskTypeId);
		}
	});
	const assesmentComponentPoints = createElement({
		elementName: 'input',
		type: 'number',
		name: 'assesmentComponentPoints',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateAssesmentComponents(e, semesterId, taskTypeId);
		}
	});

	const removeAssesmentComponentBtn = createElement({
		elementName: 'button',
		classList: ['btn'],
		innerText: 'Видалити',
		eventListenerType: 'click',
		eventListener: (e) => {
			removeAssesmentComponentInputs(e, semesterId, taskTypeId);
		}
	})

	assesmentComponentsInputs.appendChild(assesmentComponentName);
	assesmentComponentsInputs.appendChild(assesmentComponentPoints);
	assesmentComponentsInputs.appendChild(removeAssesmentComponentBtn);

	container.insertBefore(assesmentComponentsInputs, addAssesmentComponent);
}