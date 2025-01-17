const fetchEducationalPrograms = async (query) => {
	const response = await fetch(`api/searchEducationalPrograms?query=${encodeURIComponent(query)}`);
	const data = await response.json();

	return data.map(educationalPrograms => ({
		value: educationalPrograms.id,
		label: educationalPrograms.name,
	}));
};
