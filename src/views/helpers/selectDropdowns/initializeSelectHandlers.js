const initializeSelectHandlers = ({ semestersIds }) => {
	facultySelectHandler();
	departmentSelectHandler();
	stydingLevelSelectHandler();
	specialtySelectHandler();
	educationalProgramSelectHandler();
	createdByPersonsSelectHandler();
	educationalProgramGuarantorSelectHandler();
	headOfDepartmentSelectHandler();
	headOfCommissionSelectHandler();
	approvedBySelectHandler();
	docApprovedBySelectHandler();
	semestersIds.forEach(semesterId => {
		examTypeSelectHandler(semesterId);
	});
};