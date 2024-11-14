const createSemesterContainer = (semesterId) => {
	const semestersContainer = document.getElementById('semestersContainer');

	const semesterTitle = document.createElement("p");
	semesterTitle.id = `semesterTitle${semesterId}`;
	semesterTitle.classList.add('mini-block-title');
	semesterTitle.innerText = 'Семестер';

	const semesterDataBlock = document.createElement("div");
	semesterDataBlock.classList.add('semester-data-block');

	const semesterNumberLabel = document.createElement("label");
	const semesterNumberLabelName = document.createElement("p");
	semesterNumberLabelName.innerText = 'Номер семестру:';
	const semesterNumberInput = document.createElement("input");
	semesterNumberInput.type = 'number';
	semesterNumberInput.name = 'semesterNumber';
	semesterNumberInput.addEventListener('input', function (event) {
		updateNumberInput(event, semesterId, `semesterTitle${semesterId}`, 'Семестер', updateSemesterInfo);
	});

	semesterNumberLabel.appendChild(semesterNumberLabelName);
	semesterNumberLabel.appendChild(semesterNumberInput);

	const examTypeLabel = document.createElement("label");
	const examTypeLabelName = document.createElement("p");
	examTypeLabelName.innerText = 'Вид контролю:';
	const examTypeInput = document.createElement("input");
	examTypeInput.type = 'text';
	examTypeInput.name = 'examType';
	examTypeInput.addEventListener('input', function (event) {
		updateSemesterInfo(event, semesterId);
	});
	examTypeLabel.appendChild(examTypeLabelName);
	examTypeLabel.appendChild(examTypeInput);

	const modulesContainer = document.createElement("div");
	modulesContainer.id = `modulesContainer${semesterId}`;
	modulesContainer.classList.add('modules-container');

	const addModuleBtn = document.createElement("button");
	addModuleBtn.id = `addModuleBtn${semesterId}`;
	addModuleBtn.innerHTML = 'Додати модуль';
	addModuleBtn.classList.add("btn");

	modulesContainer.appendChild(addModuleBtn);

	addModuleBtn.addEventListener('click', (event) => {
		addModule(event, semesterId, `addModuleBtn${semesterId}`, `modulesContainer${semesterId}`)
	});

	semesterDataBlock.appendChild(semesterNumberLabel)
	semesterDataBlock.appendChild(examTypeLabel)

	semestersContainer.appendChild(semesterTitle);
	semestersContainer.appendChild(semesterDataBlock);
	semestersContainer.appendChild(modulesContainer);
}
