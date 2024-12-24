const createSemesterContainer = (semesterId, educationalForms) => {
	// Створення контейнера для новододаного семестру
	const semestersContainer = document.getElementById('semestersContainer');

	const semesterBlock = createElement({ elementName: "div", id: `semesterBlock${semesterId}`, classList: ["block"] });

	const titleContainer = createElement({ elementName: "div", classList: ["semester-title-container"] });

	const semesterTitle = createElement({
		elementName: "p",
		id: `semesterTitle${semesterId}`,
		innerText: 'Семестер',
		classList: ['block-title', 'semester-title']
	});

	const removeSemesterBtn = createElement({
		elementName: "button",
		innerText: "Видалити семестр",
		classList: ["btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			openApproveDeletingModal('семестр', () => deleteSemester(event, semesterId));
		}
	});

	titleContainer.appendChild(semesterTitle);
	titleContainer.appendChild(removeSemesterBtn);

	// Створення блоку з даними для новододаного семестру
	const semesterDataBlock = createElement({ elementName: "div", classList: ['semester-data-block'] });

	// Додавання контейнеру для чекбоксів форм навчання
	const educationalFormsContainer = createElement({ elementName: "div", classList: ['educational-forms-container'] });

	// Додавання чекбоксів для усіх існуючих форм навчання
	educationalForms.forEach(form => {
		const formCheckbox = createCheckboxWithLabelAtTheEnd({
			labelText: form.name,
			inputName: form.colName,
			eventListener: (event) => {
				checkTogglingEducationalForm(event, semesterId, form.id)
			}
		})

		educationalFormsContainer.appendChild(formCheckbox);
	})

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
		inputName: 'examTypeId',
		eventListener: (event) => {
			updateSemesterInfo(event, semesterId);
		}
	});

	const colloquiumCheckbox = createCheckboxWithLabelAtTheBeginning({
		labelText: 'Є курсовий',
		inputName: 'isCourseworkExists',
		checked: false,
		eventListener: (event) => {
			checkTogglingCoursework(event, semesterId);
		}
	})

	// Створення контейнера для модулів, які додаватимуться
	const modulesContainer = createElement({ elementName: "div", id: `modulesContainer${semesterId}`, classList: ['modules-container'] });

	// Створення кнопки для додавання модулів
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

	semesterDataBlock.appendChild(educationalFormsContainer);
	semesterDataBlock.appendChild(semesterNumberLabel);
	semesterDataBlock.appendChild(examTypeLabel);
	semesterDataBlock.appendChild(colloquiumCheckbox);

	semesterBlock.appendChild(titleContainer);
	semesterBlock.appendChild(semesterDataBlock);
	semesterBlock.appendChild(modulesContainer);

	semestersContainer.appendChild(semesterBlock);
}
