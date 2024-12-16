const fetchStydingLevelTypes = async () => {
	const response = await fetch(`api/etStydingLevelTypes`);
	const data = await response.json();

	return data.map(stydingLevel => ({
		value: stydingLevel.id,
		label: `${stydingLevel.name}`,
	}));
};