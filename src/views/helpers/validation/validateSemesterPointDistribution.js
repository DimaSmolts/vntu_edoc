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
			name: maxValueWarningName,
			isParentElementHighlight: false
		});

		const warning = {
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: minValueWarningName,
			message: `⚠️ Кількість балів для ${semesterNumber} семестру НИЖЧА ніж необхідно (коректне значення - ${correctValue})`,
			slideNumber: getSlideNumberByName('pointDistribution'),
			isParentElementHighlight: false
		}

		addWarning(warning);
	} else if (value > correctValue) {
		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: minValueWarningName,
			isParentElementHighlight: false
		})

		const warning = {
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: maxValueWarningName,
			message: `⚠️ Кількість балів для ${semesterNumber} семестру ВИЩА ніж необхідно (коректне значення - ${correctValue})`,
			slideNumber: getSlideNumberByName('pointDistribution'),
			isParentElementHighlight: false
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: minValueWarningName,
			isParentElementHighlight: false
		});

		removeWarning({
			targetElement: element,
			group: 'pointDistributionValidationGroup',
			name: maxValueWarningName,
			isParentElementHighlight: false
		});
	}
}
