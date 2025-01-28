const initializeSelectHandlers = ({ wpId, semestersIds, specialtyWithEducationalProgramIds }) => {
	console.log(specialtyWithEducationalProgramIds);
	facultySelectHandler();
	departmentSelectHandler();
	stydingLevelSelectHandler();
	fieldOfStudySelectHandler(wpId);

	if (specialtyWithEducationalProgramIds?.length > 0) {
		Object.keys(specialtyWithEducationalProgramIds).forEach(idx => {
			specialtySelectHandler(idx);
			educationalProgramSelectHandler(idx);
		})
	} else {
		specialtySelectHandler(0);
		educationalProgramSelectHandler(0);
	}

	subjectTypeSelectHandler();
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