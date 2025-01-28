const fetchEducationalPrograms = async (query, specialtyId) => {
	const response = await fetch(`api/searchEducationalPrograms?query=${encodeURIComponent(query)}&specialtyId=${specialtyId}`);
	const data = await response.json();

	return data.map(educationalPrograms => ({
		value: educationalPrograms.id,
		label: educationalPrograms.name,
	}));
};
