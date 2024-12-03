const addAssesmentComponentsInputs = (event, semesterId) => {
	event.preventDefault();
	const courseworkAssesmentComponentsInputs = createElement({ elementName: 'div', classList: ['coursework-assesment-components-inputs'] });

	const assesmentComponentName = createElement({
		elementName: 'input',
		type: 'text',
		name: 'assesmentComponentName',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateAssesmentComponents(e, semesterId);
		}
	});
	const assesmentComponentPoints = createElement({
		elementName: 'input',
		type: 'number',
		name: 'assesmentComponentPoints',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateAssesmentComponents(e, semesterId);
		}
	});

	const removeAssesmentComponentBtn = createElement({
		elementName: 'button',
		classList: ['btn'],
		innerText: 'Видалити',
		eventListenerType: 'click',
		eventListener: (e) => {
			removeAssesmentComponentInputs(e, semesterId);
		}
	})

	courseworkAssesmentComponentsInputs.appendChild(assesmentComponentName);
	courseworkAssesmentComponentsInputs.appendChild(assesmentComponentPoints);
	courseworkAssesmentComponentsInputs.appendChild(removeAssesmentComponentBtn);

	const container = document.getElementById(`assesmentComponents${semesterId}`);

	const addAssesmentComponent = document.getElementById(`addAssesmentComponent${semesterId}`);

	container.insertBefore(courseworkAssesmentComponentsInputs, addAssesmentComponent);
}