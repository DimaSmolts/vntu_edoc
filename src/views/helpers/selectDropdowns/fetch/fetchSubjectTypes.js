const fetchSubjectTypes = async () => {
	const response = await fetch(`api/getSubjectTypes`);
	const data = await response.json();

	return data.map(subjectType => ({
		value: subjectType.id,
		label: `${subjectType.name}`,
	}));
};