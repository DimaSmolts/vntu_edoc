const removeSpecialtyGroup = async (idx, wpId) => {
	const specialtyContainer = document.querySelector('#specialtyContainer');
	const rawIndexes = JSON.parse(specialtyContainer.getAttribute('data-indexes'));
	const indexes = rawIndexes.map(idx => Number(idx));

	const updatedIndexes = indexes.filter(index => index !== idx);
	specialtyContainer.setAttribute('data-indexes', JSON.stringify(updatedIndexes));

	const value = indexes
		.map(index => {
			const existedEducationalProgramIdsSelect = document.querySelector(`#educationalProgramIdsSelect${index}`);
			const existedSpecialtyIdSelect = document.querySelector(`#specialtyIdSelect${index}`);

			let specId;
			let educationalProgramIds;

			if (index === Number(idx)) {
				return null;
			} else {
				specId = Number(existedSpecialtyIdSelect.getAttribute('data-specialtyId'));

				const rawSelectedEducationalProgramIds = JSON.parse(existedEducationalProgramIdsSelect.getAttribute('data-educationalProgramIds') ?? '');
				educationalProgramIds = rawSelectedEducationalProgramIds?.map(id => Number(id));

				return {
					[index]: { "specialtyId": specId, "educationalProgramsIds": educationalProgramIds }
				}
			}
		})
		.filter(v => v);

	const updatedEvent = {
		target: {
			name: 'specialtyWithEducationalProgramIds',
			value: JSON.stringify(value)
		}
	};

	await updateGeneralInfo(updatedEvent, wpId, true);

	const educationalProgramIdsLabel = document.getElementById(`educationalProgramIdsLabel${idx}`);

	const specialtyGroup = educationalProgramIdsLabel.parentNode;
	specialtyGroup.remove();
}