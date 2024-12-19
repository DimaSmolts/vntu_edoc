const fetchTeacherById = async (id) => {
	const response = await fetch(`api/searchTeacherById?id=${id}`)
	const data = await response.json();

	return {
		value: data.id,
		label: `${data.t_name}, ${data.position.name}`,
	}
};