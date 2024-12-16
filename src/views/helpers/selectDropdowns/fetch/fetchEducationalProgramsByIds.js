const fetchEducationalProgramsByIds = async (ids) => {
	const response = await fetch(`searchEducationalProgramsByIds?ids=${JSON.stringify(ids)}`)
	const data = await response.json();

	return data.map(educationalPrograms => ({
		value: educationalPrograms.id,
		label: educationalPrograms.spec,
	}));
};