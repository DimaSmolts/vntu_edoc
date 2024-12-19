const headOfDepartmentSelectHandler = async () => {
	involvedPersonSelectHandler({
		involvedPersonName: 'headOfDepartment',
		selectInvolvedPerson: selectHeadOfDepartment,
		selectNewInvolvedPerson: selectNewHeadOfDepartment
	})
};