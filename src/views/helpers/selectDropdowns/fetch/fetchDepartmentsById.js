const fetchDepartmentsById = async (id) => {
	const response = await fetch(`api/searchDepartmentsById?id=${id}`);
	const data = await response.json();

	return data.map(department => ({
		value: department.id,
		label: `${department.d_name}`,
	}));
};