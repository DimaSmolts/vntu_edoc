const fetchSpecialties = async (query) => {
	const response = await fetch(`api/searchSpecialties?query=${encodeURIComponent(query)}`);
	const data = await response.json();

	return data.map(specialty => ({
		value: specialty.id,
		label: `${specialty.spec_num_code} ${specialty.spec}`,
	}));
};