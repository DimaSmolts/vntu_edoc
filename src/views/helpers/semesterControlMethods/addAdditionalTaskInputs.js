const addAdditionalTaskInputs = (event, semesterId) => {
	event.preventDefault();

	const container = document.getElementById(`additionalTaskComponents${semesterId}`);

	const addAssesmentComponent = document.getElementById(`addAdditionalTask${semesterId}`);

	const componentsInputs = createElement({ elementName: 'div', classList: ['additional-task-components-inputs'] });

	const additionalTaskName = createElement({
		elementName: 'input',
		type: 'text',
		name: 'additionalTaskName',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateAdditionalTasks(e, semesterId);
		}
	});

	const removeBtn = createElement({
		elementName: 'button',
		classList: ['btn'],
		innerText: 'Видалити',
		eventListenerType: 'click',
		eventListener: (e) => {
			removeAdditionalTaskInputs(e, semesterId);
		}
	})

	componentsInputs.appendChild(additionalTaskName);
	componentsInputs.appendChild(removeBtn);

	container.insertBefore(componentsInputs, addAssesmentComponent);

}