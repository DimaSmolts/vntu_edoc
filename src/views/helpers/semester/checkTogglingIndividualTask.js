const checkTogglingIndividualTask = (event, semesterId, titleName) => {
	// Якщо чекбокс знімається, то видаляємо індивідуальне завдання
	if (!event.target.checked) {
		openApproveDeletingModal(titleName, () => toggleIndividualTask(event, semesterId), event.target);
		return;
	}

	// Якщо чекбокс встановлюється, то знімаємо його з іншого відповідного місця, якщо він там встановленний
	if (event.target.id === `coursework${semesterId}`) {
		const courseProjectCheckbox = document.getElementById(`courseProject${semesterId}`);

		if (courseProjectCheckbox.checked) {
			openApproveDeletingModal(
				'курсовий проєкт та замінити його курсовою роботою',
				() => toggleIndividualTask(event, semesterId, courseProjectCheckbox),
				event.target
			);
		} else {
			toggleIndividualTask(event, semesterId);
		}
	}

	if (event.target.id === `courseProject${semesterId}`) {
		const courseworkCheckbox = document.getElementById(`coursework${semesterId}`);

		if (courseworkCheckbox.checked) {
			openApproveDeletingModal(
				'курсову роботу та замінити її курсовим проєктом',
				() => toggleIndividualTask(event, semesterId, courseworkCheckbox),
				event.target
			);
		} else {
			toggleIndividualTask(event, semesterId);
		}
	}

	if (event.target.id === `calculationAndGraphicWork${semesterId}`) {
		const calculationAndGraphicTaskCheckbox = document.getElementById(`calculationAndGraphicTask${semesterId}`);

		if (calculationAndGraphicTaskCheckbox.checked) {
			openApproveDeletingModal(
				'розрахунково-графічну роботу та замінити її розрахунково-графічним завданням',
				() => toggleIndividualTask(event, semesterId, calculationAndGraphicTaskCheckbox),
				event.target
			);
		} else {
			toggleIndividualTask(event, semesterId);
		}
	}

	if (event.target.id === `calculationAndGraphicTask${semesterId}`) {
		const calculationAndGraphicWorkCheckbox = document.getElementById(`calculationAndGraphicWork${semesterId}`);

		if (calculationAndGraphicWorkCheckbox.checked) {
			openApproveDeletingModal(
				'розрахунково-графічне завдання та замінити його розрахунково-графічною роботою',
				() => toggleIndividualTask(event, semesterId, calculationAndGraphicWorkCheckbox),
				event.target
			);
		} else {
			toggleIndividualTask(event, semesterId);
		}
	}
}