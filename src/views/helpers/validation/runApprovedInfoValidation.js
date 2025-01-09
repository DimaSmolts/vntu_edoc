const runApprovedInfoValidation = (wpDetails) => {
	const createdByPersonsIdsSelect = document.getElementById(`createdByPersonsIdsSelect`);
	const educationalProgramGuarantorSelect = document.getElementById(`educationalProgramGuarantorSelect`);
	const headOfDepartmentSelect = document.getElementById(`headOfDepartmentSelect`);
	const headOfCommissionSelect = document.getElementById(`headOfCommissionSelect`);
	const approvedBySelect = document.getElementById(`approvedBySelect`);

	validateCreatedByPersons({
		element: createdByPersonsIdsSelect,
		value: wpDetails.createdByPersons
	});

	validateEducationalProgramGuarantor({
		element: educationalProgramGuarantorSelect,
		value: wpDetails.educationalProgramGuarantor
	});

	validateHeadOfDepartment({
		element: headOfDepartmentSelect,
		value: wpDetails.headOfDepartment
	});

	validateHeadOfCommission({
		element: headOfCommissionSelect,
		value: wpDetails.headOfCommission
	});

	validateApprovedBy({
		element: approvedBySelect,
		value: wpDetails.approvedBy
	});
}
