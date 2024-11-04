document.addEventListener("DOMContentLoaded", function () {
	const urlParams = new URLSearchParams(window.location.search);
	const id = urlParams.get('id');

	fetch(`api/getFormInfo.php?id=${id}`, {
		method: 'GET'
	})
		.then(response => response.json())
		.then(data => {
			if (data) {
				console.log(data)
				const convertedData = convertFormInfoApiResult(data.message[0]);

				preloadTeachers(convertedData.createdById);
				mapValuesToFields(convertedData);


				if (convertedData.fullTimeCharacteristicId) {
					const block = document.getElementById('fullTimeBlock');
					const btn = document.getElementById('fullTimeBlockBtn');

					block.style.display = 'block';
					btn.disabled = true;

					block.dataset.EDCId = convertedData.fullTimeCharacteristicId;
				}

				if (convertedData.correspondenceCharacteristicId) {
					const block = document.getElementById('correspondenceBlock');
					const btn = document.getElementById('correspondenceBlockBtn');

					block.style.display = 'block';
					btn.disabled = true;

					block.dataset.EDCId = convertedData.correspondenceCharacteristicId;
				}
			} else {
				console.error('No JSON response received');
			}
		})
		.catch(error => console.error('Fetch error:', error));
});