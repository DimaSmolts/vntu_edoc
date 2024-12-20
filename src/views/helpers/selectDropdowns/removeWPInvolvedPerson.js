const removeWPInvolvedPerson = ({ id, isCreatedBy = false, newSelectedCreatedByInvolvedPersonsIds = null, isDocAprovedBy = false, personPositionName = null }) => {
	fetch(`api/deleteWPInvolvedPerson/?id=${id}`, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(response => response.json())
		.then(data => {
			if (data.status === 'success') {
				if (isCreatedBy) {
					document.getElementById(`createdBy${id}AdditionalInfoBlock`).remove();

					const createdByPersonsSelect = document.getElementById('createdByPersonsIdsSelect');

					const updatedCreatedByInvolvedPersonsIds = JSON.stringify(newSelectedCreatedByInvolvedPersonsIds);
					createdByPersonsSelect.setAttribute('data-createdByInvolvedPersonsIds', updatedCreatedByInvolvedPersonsIds);
				} else if (isDocAprovedBy) {
					document.getElementById('docApprovedByPosition').remove();
					const select = document.getElementById('docApprovedBySelect');
					select.removeAttribute('data-wpInvolvedPersonId');

					const docApprovedByBlock = document.getElementById('docApprovedByBlock');
					docApprovedByBlock.classList.remove('doc-approved-by-additional-info-block');
					docApprovedByBlock.classList.add('doc-approved-by-info-block')
				} else {
					const degree = document.getElementById(`${personPositionName}Degree`);
					const position = document.getElementById(`${personPositionName}Position`);
					const minutesOfMeeting = document.getElementById(`${personPositionName}MinutesOfMeeting`);

					if (degree) {
						degree.remove();
					}

					if (position) {
						position.remove();
					}

					if (minutesOfMeeting) {
						minutesOfMeeting.remove();
					}

					const block = document.getElementById(`${personPositionName}Block`);
					if (personPositionName === 'educationalProgramGuarantor') {
						block.classList.add('involved-person-info-block', 'guarantor-info-block');
					} else {
						block.classList.add('involved-person-info-block')
					}
					block.classList.remove('involved-person-additional-info-block')

					const select = document.getElementById(`${personPositionName}Select`);
					select.removeAttribute('data-wpInvolvedPersonId');
					select.removeAttribute(`data-${personPositionName}Id`);
				}
			} else {
				console.log('Failed to delete the theme.');
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
}