const removeWPInvolvedPerson = ({ id, isCreatedBy = false, newSelectedCreatedByInvolvedPersonsIds = null }) => {
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

					const createdByAdditionalInfoBlock = document.getElementById('createdByAdditionalInfoBlock');
					createdByAdditionalInfoBlock.classList.remove('one-column', 'two-columns', 'three-columns');

					let columnClass = 'three-columns';

					switch (createdByAdditionalInfoBlock.children.length) {
						case 1:
							columnClass = 'one-column';
							break;
						case 2:
							columnClass = 'two-columns';
							break;
						default:
							break;
					}

					createdByAdditionalInfoBlock.classList.add(columnClass);
				} else {
					console.log('Failed to delete the theme.');
				}
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
}