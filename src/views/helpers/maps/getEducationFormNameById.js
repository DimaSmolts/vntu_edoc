const educationFormIdToName = {
	1: 'денна',
	2: 'заочна',
	3: 'дуальна'
};

const getEducationFormNameById = (id) => {
	return educationFormIdToName[id];
};