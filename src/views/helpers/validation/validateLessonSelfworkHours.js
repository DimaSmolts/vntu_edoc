const validateLessonSelfworkHours = ({
	element = null,
	value,
	lessonHours,
	lessonTypeId,
	educationalFormId,
	semesterId,
	semesterNumber
}) => {
	const warningName = `${getLessonTypeDBNameById(lessonTypeId)}SelfworkEFId${educationalFormId}Sem${semesterId}MinValue`

	const minValue = lessonTypeId === getLessonTypeIdByName('lection') ? lessonHours * 0.25 : lessonHours * 1;

	if (value < minValue) {
		const warning = {
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: warningName,
			message: `⚠️ Кількість годин для ${getMessageBeginning(lessonTypeId)} (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) НИЖЧА ніж необхідно (мін. значення - ${minValue})`,
			slideNumber: getSlideNumberByName('selfworkContent')
		}

		addWarning(warning)
	} else {
		removeWarning({
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: warningName
		})
	}
}

const getMessageBeginning = (lessonTypeId) => {
	if (lessonTypeId === getLessonTypeIdByName('lection')) {
		return 'опрацювання лекційного матеріалу';
	} else if ((lessonTypeId === getLessonTypeIdByName('laboratory'))) {
		return 'підготовки до лабораторних занять';
	} else if ((lessonTypeId === getLessonTypeIdByName('practical'))) {
		return 'підготовки до практичних занять';
	} else if ((lessonTypeId === getLessonTypeIdByName('seminar'))) {
		return 'підготовки до семінарських занять';
	}
}