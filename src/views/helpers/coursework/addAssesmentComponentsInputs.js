const addAssesmentComponentsInputs = (
	event,
	semesterId,
	container,
	addAssesmentComponent,
	updateCourseworkAssesmentComponents,
	removeCourseworkAssesmentComponentInputs
) => {
	const courseworkAssesmentComponentsInputs = createElement({ elementName: 'div', classList: ['assesment-components-inputs'] });

	const assesmentComponentName = createElement({
		elementName: 'input',
		type: 'text',
		name: 'assesmentComponentName',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateCourseworkAssesmentComponents(e, semesterId);
		}
	});
	const assesmentComponentPoints = createElement({
		elementName: 'input',
		type: 'number',
		name: 'assesmentComponentPoints',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateCourseworkAssesmentComponents(e, semesterId);
		}
	});

	const removeAssesmentComponentBtn = createElement({
		elementName: 'button',
		classList: ['btn'],
		innerText: 'Видалити',
		eventListenerType: 'click',
		eventListener: (e) => {
			removeCourseworkAssesmentComponentInputs(e, semesterId);
		}
	})

	courseworkAssesmentComponentsInputs.appendChild(assesmentComponentName);
	courseworkAssesmentComponentsInputs.appendChild(assesmentComponentPoints);
	courseworkAssesmentComponentsInputs.appendChild(removeAssesmentComponentBtn);

	container.insertBefore(courseworkAssesmentComponentsInputs, addAssesmentComponent);
}