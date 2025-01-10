const fetchFieldsOfStudy = async () => {
	const response = await fetch('api/searchFieldsOfStudy');
	const data = await response.json();

	return data.map(fieldOfStudy => ({
		value: fieldOfStudy.id,
		label: `${fieldOfStudy.name}`,
	}));
};