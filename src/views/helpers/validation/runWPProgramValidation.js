const runWPProgramValidation = ({ wpDetails, educationalForms }) => {
	const isSemestersAmountValid = validateSemestersAmount({
		value: wpDetails.semesters
	});

	if (isSemestersAmountValid) {
		const educationalDisciplineSemesterProgram = document.getElementById('educationalDisciplineSemesterProgram');

		const semestersIds = JSON.parse(educationalDisciplineSemesterProgram.getAttribute('data-semestersIds'));
		const modulesIds = JSON.parse(educationalDisciplineSemesterProgram.getAttribute('data-modulesIds'));

		const currentModulesIds = [];

		wpDetails.semesters.forEach(semester => {
			const isModulesAmountValid = validateModulesAmount({
				value: semester.modules,
				semesterId: semester.id,
				semesterNumber: semester.semesterNumber
			});

			if (isModulesAmountValid) {
				semester.modules.forEach(module => {
					validateThemesAmount({
						value: module.themes,
						moduleId: module.moduleId,
						moduleNumber: module.moduleNumber,
						semesterNumber: module.semesterNumber
					});

					currentModulesIds.push(module.moduleId);
				})
			}

			const educationalFormsCheckboxes = educationalForms
				.map(educationalForm => {
					return document.getElementById(`semester${semester.id}${educationalForm.colName}Checkbox`);
				})
				.filter(checkbox => checkbox);

			validateEducationalFormsAmount({
				elements: educationalFormsCheckboxes.length > 0 ? educationalFormsCheckboxes : null,
				value: semester.educationalForms,
				semesterId: semester.id,
				semesterNumber: semester.semesterNumber
			})
		});

		const currentSemestersIds = wpDetails.semesters.map(({ id }) => id);

		const notExistedSemestersIds = semestersIds.filter(id => !currentSemestersIds.includes(id));

		notExistedSemestersIds.forEach(semesterId => {
			const warningName = `modulesSem${semesterId}Empty`;

			removeWarning({
				group: 'programValidationGroup',
				name: warningName
			});
		})

		const notExistedModulesIds = modulesIds.filter(id => !currentModulesIds.includes(id));

		notExistedModulesIds.forEach(moduleId => {
			const warningName = `themesSem${moduleId}Empty`;

			removeWarning({
				group: 'programValidationGroup',
				name: warningName
			});
		})
	}
}