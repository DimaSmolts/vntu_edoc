const fetchExamTypes = async () => {
	const response = await fetch(`api/getExamTypes`);
	const data = await response.json();

	return data.map(examType => ({
		value: examType.id,
		label: `${examType.e_name}`,
	}));
};