const runGeneralInfoValidation = (wpDetails) => {
	const facultyIdSelect = document.getElementById(`facultyIdSelect`);
	const departmentIdSelect = document.getElementById(`departmentIdSelect`);
	const disciplineNameInput = document.getElementById(`disciplineName`);
	const stydingLevelIdSelect = document.getElementById(`stydingLevelIdSelect`);
	const specialtyIdsSelect = document.getElementById(`specialtyIdsSelect`);
	const docApprovedBySelect = document.getElementById(`docApprovedBySelect`);
	const academicYearInput = document.getElementById(`academicYear`);
	const creditsAmountInput = document.getElementById(`creditsAmount`);
	const codeInput = document.getElementById(`code`);

	validateFaculty({
		element: facultyIdSelect,
		value: wpDetails.facultyId
	});

	validateDepartment({
		element: departmentIdSelect,
		value: wpDetails.departmentId
	});

	validateDisciplineName({
		element: disciplineNameInput,
		value: wpDetails.disciplineName
	});

	validateStydingLevel({
		element: stydingLevelIdSelect,
		value: wpDetails.stydingLevelId
	});

	validateSpecialties({
		element: specialtyIdsSelect,
		value: wpDetails.specialtyIds
	});

	validateDocApprovedBy({
		element: docApprovedBySelect,
		value: wpDetails.docApprovedBy
	});

	validateAcademicYear({
		element: academicYearInput,
		value: wpDetails.academicYear
	});

	validateCreditsAmount({
		element: creditsAmountInput,
		value: wpDetails.creditsAmount
	});
	
	validateCode({
		element: codeInput,
		value: wpDetails.code
	});
}
