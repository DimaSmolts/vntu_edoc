const initializeTextEditorsForApprovedPage = ({
	educationalProgramGuarantorId,
	educationalProgramGuarantorPositionName,
	headOfDepartmentId,
	headOfDepartmentPositionName,
	headOfCommissionId,
	headOfCommissionPositionName,
	approvedById,
	approvedByPositionName,
	docApprovedById,
	docApprovedByPositionName,
	wpId
}) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	docApprovedByPosition({ docApprovedById, docApprovedByPositionName, wpId });
	educationalProgramGuarantorPosition({ educationalProgramGuarantorId, educationalProgramGuarantorPositionName, wpId });
	headOfDepartmentPosition({ headOfDepartmentId, headOfDepartmentPositionName, wpId });
	headOfCommissionPosition({ headOfCommissionId, headOfCommissionPositionName, wpId });
	approvedByPosition({ approvedById, approvedByPositionName, wpId });
} 