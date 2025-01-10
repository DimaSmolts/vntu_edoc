const initializeSelectHandlers = ({ semestersIds }) => {
	facultySelectHandler();
	departmentSelectHandler();
	stydingLevelSelectHandler();
	fieldOfStudySelectHandler();
	specialtySelectHandler();
	educationalProgramSelectHandler();
	createdByPersonsSelectHandler();
	educationalProgramGuarantorSelectHandler();
	headOfDepartmentSelectHandler();
	headOfCommissionSelectHandler();
	approvedBySelectHandler();
	docApprovedBySelectHandler();
	if (semestersIds && semestersIds.length > 0) {
		semestersIds.forEach(semesterId => {
			examTypeSelectHandler(semesterId);
		});
	}
};