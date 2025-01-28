const fetchSpecialtiesById = async (id) => {
	const response = await fetch(`api/searchSpecialtiesById?id=${id}`)
	const data = await response.json();

	return data.map(specialty => ({
		value: specialty.id,
		label: `${specialty.spec_num_code} ${specialty.name}`,
	}));
};