const fetchAdditionalTasks = async () => {
	const response = await fetch('api/searchAdditionalTasks');
	const data = await response.json();

	return data.map(additionalTask => ({
		value: additionalTask.id,
		label: `${additionalTask.name}`,
	}));
};