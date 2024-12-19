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
	if (createdByPersons.length > 0) {
		createdByPersonsPositions({ createdByPersons, wpId })
	}

	if (educationalProgramGuarantorId) {
		educationalProgramGuarantorPosition({ educationalProgramGuarantorId, educationalProgramGuarantorPositionName, wpId });
	}

	if (headOfDepartmentId) {
		headOfDepartmentPosition({ headOfDepartmentId, headOfDepartmentPositionName, wpId });
	}

	if (headOfCommissionId) {
		headOfCommissionPosition({ headOfCommissionId, headOfCommissionPositionName, wpId });
	}

	if (approvedById) {
		approvedByPosition({ approvedById, approvedByPositionName, wpId });
	}
} 