const fetchSpecialtiesByIds = async (ids) => {
	const response = await fetch(`searchSpecialtiesByIds?ids=${JSON.stringify(ids)}`)
	const data = await response.json();

	return data.map(specialty => ({
		value: specialty.id,
		label: `${specialty.spec_num_code} ${specialty.spec}`,
	}));
};