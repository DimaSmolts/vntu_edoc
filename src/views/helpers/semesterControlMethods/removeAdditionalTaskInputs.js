const removeAdditionalTaskInputs = (event, semesterId) => {
	event.preventDefault();

	const parent = event.target.parentNode;
	parent.remove();

	updateAdditionalTasks(event, semesterId);
}