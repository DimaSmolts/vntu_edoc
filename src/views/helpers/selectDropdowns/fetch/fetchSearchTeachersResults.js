const fetchSearchTeachersResults = async (query) => {
	const response = await fetch(`searchTeachers?query=${encodeURIComponent(query)}`);
	const data = await response.json();

	return data.map(teacher => ({
		value: teacher.id,
		label: `${teacher.t_name}, ${teacher.position.name}`,
	}));
};