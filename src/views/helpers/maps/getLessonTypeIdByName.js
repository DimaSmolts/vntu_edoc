const lessonTypeNameToId = {
	'lection': 1,
	'practical': 2,
	'seminar': 3,
	'laboratory': 4
};

const getLessonTypeIdByName = (name) => {
	return lessonTypeNameToId[name];
};