const updateNumberInput = (event, id, titleId, innerText, update) => {
	event.preventDefault();

	const semesterTitle = document.getElementById(titleId);

	semesterTitle.innerText = `${innerText} ${event.target.value}`;

	update(event, id);
}