const validateCourseTypeWorkAssesmentComponentTotal = ({
	element = null,
	value,
	taskTypeName,
	semesterId,
	semesterNumber
}) => {
	const minValueWarningName = `assesmentComponentSem${semesterId}MinValue`;
	const maxValueWarningName = `assesmentComponentSem${semesterId}MaxValue`;

	const correctValue = 100;

	if (value < correctValue) {
		removeWarning({
			targetElement: element,
			group: 'assesmentComponentValidationGroup',
			name: maxValueWarningName,
			isParentElementHighlight: false
		});

		const warning = {
			targetElement: element,
			group: 'assesmentComponentValidationGroup',
			name: minValueWarningName,
			message: `⚠️ ${taskTypeName} (${semesterNumber} сем.) має НИЖЧУ кількість балів ніж необхідно (коректне значення - ${correctValue})`,
			isParentElementHighlight: false
		}

		addWarning(warning);
	} else if (value > correctValue) {
		removeWarning({
			targetElement: element,
			group: 'assesmentComponentValidationGroup',
			name: minValueWarningName,
			isParentElementHighlight: false
		})

		const warning = {
			targetElement: element,
			group: 'assesmentComponentValidationGroup',
			name: maxValueWarningName,
			message: `⚠️ ${taskTypeName} (${semesterNumber} сем.) має ВИЩУ кількість балів ніж необхідно (коректне значення - ${correctValue})`,
			isParentElementHighlight: false
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'assesmentComponentValidationGroup',
			name: minValueWarningName,
			isParentElementHighlight: false
		});

		removeWarning({
			targetElement: element,
			group: 'assesmentComponentValidationGroup',
			name: maxValueWarningName,
			isParentElementHighlight: false
		});
	}
}
