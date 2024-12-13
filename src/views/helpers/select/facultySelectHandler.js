const facultySelectHandler = async () => {
	const facultyIdSelect = document.querySelector('#facultyIdSelect');
	const wpId = facultyIdSelect.getAttribute('data-wpId');
	const selectedFacultyId = Number(facultyIdSelect.getAttribute('data-facultyId'));

	// First, fetch the faculties from the backend
	const results = await fetchFaculties();

	// Clear any existing options and initialize Choices.js
	const facultyIdSelectChoices = createNewSelect('#facultyIdSelect'); // Re-initialize Choices.js

	// // Add the new choices to the select dropdown, and make sure to set the selected option
	// results.forEach(faculty => {
	// 	console.log(faculty.value === selectedFacultyId)
	// 	console.log(faculty)
	// 	const option = new Option(faculty.label, faculty.value, faculty.value === selectedFacultyId, faculty.value === selectedFacultyId);
	// 	console.log(option)

	// 	facultyIdSelect.add(option);
	// });

	const options = results.map(faculty => {
		console.log(faculty.value === selectedFacultyId)
		console.log(faculty)
		return new Option(faculty.label, faculty.value, faculty.value === selectedFacultyId, faculty.value === selectedFacultyId);
		console.log(option)

		// facultyIdSelect.add(option);
	});

	// Reinitialize Choices.js to update the dropdown with the correct choices
	facultyIdSelectChoices.setChoices(options, 'value', 'label', true);

	// Add event listener for when a faculty is selected
	facultyIdSelect.addEventListener('change', async (event) => {
		event.target.name = 'facultyId';

		await updateGeneralInfo(event, wpId);
	});
};