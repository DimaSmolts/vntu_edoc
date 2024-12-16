const fetchFaculties = async () => {
	const response = await fetch(`api/getFaculties`);
	const data = await response.json();

	return data.map(faculty => ({
		value: faculty.id,
		label: `${faculty.d_name}`,
	}));
};