const headOfCommissionSelectHandler = async () => {
	involvedPersonSelectHandler({
		involvedPersonName: 'headOfCommission',
		selectInvolvedPerson: selectHeadOfCommission,
		selectNewInvolvedPerson: selectNewHeadOfCommission
	});
};