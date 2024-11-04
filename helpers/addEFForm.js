const addEFForm = (event, efBlockId, eFName) => {
	event.preventDefault();
	event.srcElement.disabled = true;

	const block = document.getElementById(efBlockId);

	block.style.display = 'block';

	const urlParams = new URLSearchParams(window.location.search);
	const edId = urlParams.get('id');

	const eDField = efBlockId === 'fullTimeBlock' ? 'fullTimeCharacteristicId' : 'correspondenceCharacteristicId';

	const postData = {
		edId,
		eFName
	};

	fetch(`api/createEDCharacteristic.php`, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})
		.then(response => response.json())
		.then(data => {
			if (data.message) {
				block.dataset.EDCId = data.message;

				const updateEDData = {
					id: edId,
					field: eDField,
					value: data.message
				};

				updateWP(updateEDData);
			}
		})
		.catch(error => console.error('Post error:', error));
}