const getEducationalDisciplineStructureSlide = async (
	isSeminarAddBtnDisabled = false,
	isPracticalAddBtnDisabled = false,
	isLaboratoryAddBtnDisabled = false
) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getEducationalDisciplineStructure/?id=${wpId}&isSeminarVisible=${isSeminarAddBtnDisabled}&isPracticalVisible=${isPracticalAddBtnDisabled}&isLaboratoryVisible=${isLaboratoryAddBtnDisabled}`
	});

	const educationalDisciplineStructureContentContainer = document.getElementById('educationalDisciplineSemesterStructureNew');
	educationalDisciplineStructureContentContainer.innerHTML = "";
	educationalDisciplineStructureContentContainer.innerHTML = data.educationalDisciplineStructureContent;
}