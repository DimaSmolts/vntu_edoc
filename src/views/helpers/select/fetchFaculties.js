const fetchFaculties = async () => {
	const response = await fetch(`getFaculties`);
	const data = await response.json();

	return data.map(faculty => ({
		value: faculty.id,
		label: `${faculty.d_name}`,
	}));
};