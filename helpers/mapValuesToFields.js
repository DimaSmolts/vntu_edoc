const mapValuesToFields = (values) => {
	const notVisibleFields = ['id', 'fullTimeCharacteristicId', 'correspondenceCharacteristicId', 'created_at', 'educationForm', 'lectionsId', 'practicalsId', 'labolatoriesId', 'courseWorkId', 'selfstudyId', 'createdById']

	const { fullTimeCharacteristic, correspondenceCharacteristic, ...generalData } = values;

	console.log(generalData)

	Object.entries(generalData).map(([fieldName, value]) => {
		console.log(fieldName, value)
		if (value && !notVisibleFields.includes(fieldName)) {
			const input = document.getElementById(fieldName);
			input.value = value;
		}
	})

	Object.entries(fullTimeCharacteristic).map(([fieldName, value]) => {
		if (value && !notVisibleFields.includes(fieldName)) {
			const block = document.getElementById('fullTimeBlock');
			const input = block.querySelector(`#${fieldName}`);
			input.value = value;
		}
	})

	Object.entries(correspondenceCharacteristic).map(([fieldName, value]) => {
		if (value && !notVisibleFields.includes(fieldName)) {
			const block = document.getElementById('correspondenceBlock');
			const input = block.querySelector(`#${fieldName}`);
			input.value = value;
		}
	})
}