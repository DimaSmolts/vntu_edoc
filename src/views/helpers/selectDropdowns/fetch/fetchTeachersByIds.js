const fetchTeachersByIds = async (ids) => {
	const response = await fetch(`api/searchTeachersByIds?ids=${JSON.stringify(ids)}`)
	const data = await response.json();

	return data.map(teacher => ({
		value: teacher.id,
		label: `${teacher.t_name}, ${teacher.position.name}`,
	}));
};