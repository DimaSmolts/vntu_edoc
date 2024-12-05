const updateGeneralPoints = (event, wpId, semestersIds) => {
	// Створюємо Map для збору сюди всіх введених даних
	const pointsDistributionMap = new Map;

	// Шукаємо комірки з введеними даними
	const practicalPointsCell = document.getElementById(`practicalPoints`);
	const labPointsCell = document.getElementById(`labPoints`);
	const seminarPointsCell = document.getElementById(`seminarPoints`);

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

	semestersIds.forEach(id => {
		const examPointsCell = document.getElementById(`examSemester${id}`);

		if (examPointsCell) {
			const examPoints = Number(examPointsCell?.value) ?? 0;

			pointsDistributionMap.set(`examPointsSemester${id}`, examPoints);
		}
	});

	const postData = {
		id: wpId,
		field: 'pointsDistribution',
		value: Object.fromEntries(pointsDistributionMap)
	};

	// Оновлюємо в БД
	updateWP(postData);
}