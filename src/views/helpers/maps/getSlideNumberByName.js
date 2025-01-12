const slideNameToNumber = {
	'generalInfo': 0,
	'approvedInfo': 1,
	'semesterProgram': 3,
	'semesterControlMethodsProgram': 4,
	'selfworkContent': 6,
	'pointDistribution': 7,
	'courseworksAndProjectsInfoSlide': 8,
};

const getSlideNumberByName = (name) => {
	return slideNameToNumber[name];
};