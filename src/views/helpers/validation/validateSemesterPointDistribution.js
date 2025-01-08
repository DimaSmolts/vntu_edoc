const validateSemesterPointDistribution = ({
	element = null,
	value,
	semesterId,
	semesterNumber
}) => {
	const minValueWarningName = `pointDistributionSem${semesterId}MinValue`;
	const maxValueWarningName = `pointDistributionSem${semesterId}MaxValue`;

	const correctValue = 100;

	if (value < correctValue) {
		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: maxValueWarningName
		});

		const warning = {
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: minValueWarningName,
			message: `⚠️ Кількість балів для ${semesterNumber} семестру НИЖЧА (${value}) ніж необхідно (коректне значення - ${correctValue})`
		}

		addWarning(warning);
	} else if (value > correctValue) {
		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: minValueWarningName
		})

		const warning = {
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: maxValueWarningName,
			message: `⚠️ Кількість балів для ${semesterNumber} семестру ВИЩА (${value}) ніж необхідно (коректне значення - ${correctValue})`
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: minValueWarningName
		});

		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: maxValueWarningName
		});
	}
}
