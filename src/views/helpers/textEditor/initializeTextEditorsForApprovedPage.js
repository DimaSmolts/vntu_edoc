const initializeTextEditorsForApprovedPage = ({
	createdByPersons,
	educationalProgramGuarantorId,
	educationalProgramGuarantorPositionName,
	headOfDepartmentId,
	headOfDepartmentPositionName,
	headOfCommissionId,
	headOfCommissionPositionName,
	approvedById,
	approvedByPositionName,
	wpId
}) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для залучних персон
	createdByPersonsPositions({ createdByPersons, wpId })
	educationalProgramGuarantorPosition({ educationalProgramGuarantorId, educationalProgramGuarantorPositionName, wpId });
	headOfDepartmentPosition({ headOfDepartmentId, headOfDepartmentPositionName, wpId });
	headOfCommissionPosition({ headOfCommissionId, headOfCommissionPositionName, wpId });
	approvedByPosition({ approvedById, approvedByPositionName, wpId });
} 