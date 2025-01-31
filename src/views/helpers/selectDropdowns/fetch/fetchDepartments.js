const fetchDepartments = async (query) => {
	const response = await fetch(`api/searchDepartments?query=${encodeURIComponent(query)}`);
	const data = await response.json();

	return data.map(department => ({
		value: department.id,
		label: `${department.d_name}`,
	}));
};