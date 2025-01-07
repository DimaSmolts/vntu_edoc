const lessonTypeIdToName = {
	1: 'лекція',
	2: 'практичне',
	3: 'семінар',
	4: 'лабораторна'
};

const lessonTypeIdToDBName = {
	1: 'lection',
	2: 'practical',
	3: 'seminar',
	4: 'laboratory'
};

const getLessonTypeNameById = (id) => {
	return lessonTypeIdToName[id];
};

const getLessonTypeDBNameById = (id) => {
	return lessonTypeIdToDBName[id];
};