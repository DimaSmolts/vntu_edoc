const updateGeneralPoints = (event, semesterId) => {
	// Створюємо Map для збору сюди всіх введених даних
	const pointsDistributionMap = new Map;

	// Шукаємо комірки з введеними даними
	const practicalPointsCell = document.getElementById(`practicalPoints${semesterId}`);
	const labPointsCell = document.getElementById(`labPoints${semesterId}`);
	const seminarPointsCell = document.getElementById(`seminarPoints${semesterId}`);

	if (practicalPointsCell) {
		const practicalPoints = Number(practicalPointsCell?.value) ?? 0;
		// Записуємо їх до Map
		pointsDistributionMap.set('practicalPoints', practicalPoints);
	}

	if (labPointsCell) {
		const labPoints = Number(labPointsCell?.value) ?? 0;

		pointsDistributionMap.set('labPoints', labPoints);
	}

	if (seminarPointsCell) {
		const seminarPoints = Number(seminarPointsCell?.value) ?? 0;

		pointsDistributionMap.set('seminarPoints', seminarPoints);
	}

	const examPointsCell = document.getElementById(`examSemester${semesterId}`);

	if (examPointsCell) {
		const examPoints = Number(examPointsCell?.value) ?? 0;

		pointsDistributionMap.set('examPoints', examPoints);
	}

	const postData = {
		id: semesterId,
		field: 'pointsDistribution',
		value: Object.fromEntries(pointsDistributionMap)
	};

	// Оновлюємо в БД
	updateSemesterPointsDistribution(postData);
}