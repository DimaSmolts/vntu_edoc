const initializeSelectHandlers = ({ wpId, semestersIds }) => {
	facultySelectHandler();
	departmentSelectHandler();
	stydingLevelSelectHandler();
	fieldOfStudySelectHandler(wpId);
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