const docApprovedBySelectHandler = () => {
	involvedPersonSelectHandler({
		involvedPersonName: 'docApprovedBy',
		selectInvolvedPerson: selectDocApprovedBy,
		selectNewInvolvedPerson: selectNewDocApprovedBy,
		isDocAprovedBy: true
	})
};