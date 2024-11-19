const createSemesterContainer = (semesterId) => {
	const semestersContainer = document.getElementById('semestersContainer');

	const semesterBlock = createElement({ elementName: "div", id: `semesterBlock${semesterId}`, classList: ["mini-block"] });

	const titleContainer = createElement({ elementName: "div", classList: ["semester-title-container"] });

	const semesterTitle = createElement({
		elementName: "p",
		id: `semesterTitle${semesterId}`,
		innerText: 'Семестер',
		classList: ['mini-block-title']
	});

	const removeSemesterBtn = createElement({
		elementName: "button",
		innerText: "Видалити семестр",
		classList: ["btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			deleteSemester(event, semesterId);
		}
	});

	titleContainer.appendChild(semesterTitle);
	titleContainer.appendChild(removeSemesterBtn);

	const semesterDataBlock = createElement({ elementName: "div", classList: ['semester-data-block'] });

	const semesterNumberLabel = createLabelWithInput({
		labelText: 'Номер семестру:',
		inputType: 'number',
		inputName: 'semesterNumber',
		eventListener: (event) => {
			updateNumberInput(event, semesterId, `semesterTitle${semesterId}`, 'Семестер', updateSemesterInfo);
		}
	});

	const examTypeLabel = createLabelWithInput({
		labelText: 'Вид контролю:',
		inputType: 'text',
		inputName: 'examType',
		eventListener: (event) => {
			updateSemesterInfo(event, semesterId);
		}
	});

	const modulesContainer = createElement({ elementName: "div", id: `modulesContainer${semesterId}`, classList: ['modules-container'] });

	const addModuleBtn = createElement({
		elementName: "button",
		id: `addModuleBtn${semesterId}`,
		innerText: 'Додати модуль',
		classList: ['btn'],
		eventListenerType: 'click',
		eventListener: (event) => {
			addModule(event, semesterId, `addModuleBtn${semesterId}`, `modulesContainer${semesterId}`)
		}
	});

	modulesContainer.appendChild(addModuleBtn);

	semesterDataBlock.appendChild(semesterNumberLabel)
	semesterDataBlock.appendChild(examTypeLabel)

	semesterBlock.appendChild(semesterTitle);
	semesterBlock.appendChild(semesterDataBlock);
	semesterBlock.appendChild(modulesContainer);

	semestersContainer.appendChild(semesterBlock);
}
