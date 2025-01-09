const slideNameToNumber = {
	'generalInfo': 0,
	'approvedInfo': 1,
	'selfworkContent': 6,
	'courseworksAndProjectsInfoSlide': 8,
};

const getSlideNumberByName = (name) => {
	return slideNameToNumber[name];
};