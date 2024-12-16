<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="src/views/styles/common.css">
    <link rel="stylesheet" href="src/views/styles/carousel.css">
    <link rel="stylesheet" href="src/views/styles/form.css">
    <link rel="stylesheet" href="src/views/styles/semester.css">
    <!-- Бібліотека для інпутів із можливістю стилізації тексту -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <!-- Бібліотека для випадаючих списків з пошуком -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../components/wpDetails/carousel.php'; ?>
        <?php include __DIR__ . '/../components/wpDetails/deletingModal.php'; ?>

        <script src="src/views/constants/EducationalFormName.js"></script>
        <script src="src/views/constants/LessonTypesName.js"></script>
        <script src="src/views/helpers/modal/openApproveDeletingModal.js"></script>
        <script src="src/views/helpers/view/createElement.js"></script>
        <script src="src/views/helpers/view/createLabelWithInput.js"></script>
        <script src="src/views/helpers/view/createLabelWithTextarea.js"></script>
        <script src="src/views/helpers/view/createCheckboxWithLabelAtTheEnd.js"></script>
        <script src="src/views/helpers/view/createCheckboxWithLabelAtTheBeginning.js"></script>
        <script src="src/views/helpers/view/createSlide.js"></script>
        <script src="src/views/helpers/updating/updateWP.js"></script>
        <script src="src/views/helpers/updating/updateGeneralInfo.js"></script>
        <script src="src/views/helpers/carousel/arrowsHandler.js"></script>
        <script src="src/views/helpers/carousel/getStructureForAssessmentCriteriasSlides.js"></script>
        <script src="src/views/helpers/carousel/addAssessmentCriteriasSlides.js"></script>
        <script src="src/views/helpers/carousel/getCourseworkSlide.js"></script>
        <script src="src/views/helpers/carousel/getPointsDistributionSlide.js"></script>
        <script src="src/views/helpers/updating/updateSemesterInfo.js"></script>
        <script src="src/views/helpers/updating/updateModuleInfo.js"></script>
        <script src="src/views/helpers/updating/updateThemeInfo.js"></script>
        <script src="src/views/helpers/updating/updateLessonInfo.js"></script>
        <script src="src/views/helpers/updating/updateHours.js"></script>
        <script src="src/views/helpers/updating/updateCourseworkHours.js"></script>
        <script src="src/views/helpers/updating/updateWorkingProgramGlobalDataOverwrite.js"></script>
        <script src="src/views/helpers/updating/updateWPLiterature.js"></script>
        <script src="src/views/helpers/deleting/deleteLesson.js"></script>
        <script src="src/views/helpers/deleting/deleteTheme.js"></script>
        <script src="src/views/helpers/deleting/deleteModule.js"></script>
        <script src="src/views/helpers/deleting/deleteSemester.js"></script>
        <script src="src/views/helpers/selectDropdowns/createNewSelect.js"></script>
        <script src="src/views/helpers/selectDropdowns/createNewSelectWithSearch.js"></script>
        <script src="src/views/helpers/selectDropdowns/fetch/fetchSearchTeachersResults.js"></script>
        <script src="src/views/helpers/selectDropdowns/fetch/fetchFaculties.js"></script>
        <script src="src/views/helpers/selectDropdowns/fetch/fetchDepartments.js"></script>
        <script src="src/views/helpers/selectDropdowns/fetch/fetchDepartmentsById.js"></script>
        <script src="src/views/helpers/selectDropdowns/fetch/fetchStydingLevelTypes.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/educationalProgramGuarantorSelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/headOfDepartmentSelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/headOfCommissionSelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/approvedBySelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/docApprovedBySelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/facultySelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/departmentSelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectHandlers/stydingLevelSelectHandler.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectsHandlers.js"></script>
        <script src="src/views/helpers/selectDropdowns/updateWPInvolvedPerson.js"></script>
        <script src="src/views/helpers/selectDropdowns/updateWPInvolvedPersonDetails.js"></script>
        <script src="src/views/helpers/selectDropdowns/select/selectCreatedBy.js"></script>
        <script src="src/views/helpers/selectDropdowns/select/selectEducationalProgramGuarantor.js"></script>
        <script src="src/views/helpers/selectDropdowns/select/selectHeadOfDepartment.js"></script>
        <script src="src/views/helpers/selectDropdowns/select/selectHeadOfCommission.js"></script>
        <script src="src/views/helpers/selectDropdowns/select/selectApprovedBy.js"></script>
        <script src="src/views/helpers/selectDropdowns/select/selectDocApprovedBy.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectNew/selectNewEducationalProgramGuarantor.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectNew/selectNewHeadOfDepartment.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectNew/selectNewHeadOfCommission.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectNew/selectNewApprovedBy.js"></script>
        <script src="src/views/helpers/selectDropdowns/selectNew/selectNewDocApprovedBy.js"></script>
        <script src="src/views/helpers/semester/buttonsHandlers.js"></script>
        <script src="src/views/helpers/semester/addNewSemester.js"></script>
        <script src="src/views/helpers/semester/addNewModule.js"></script>
        <script src="src/views/helpers/semester/addNewTheme.js"></script>
        <script src="src/views/helpers/semester/checkTogglingEducationalForm.js"></script>
        <script src="src/views/helpers/semester/checkTogglingCoursework.js"></script>
        <script src="src/views/helpers/semester/checkTogglingColloquium.js"></script>
        <script src="src/views/helpers/semester/createSemesterContainer.js"></script>
        <script src="src/views/helpers/semester/createModuleBlock.js"></script>
        <script src="src/views/helpers/semester/createThemeBlock.js"></script>
        <script src="src/views/helpers/semester/updateNumberInput.js"></script>
        <script src="src/views/helpers/semester/toggleEducationalForm.js"></script>
        <script src="src/views/helpers/semester/toggleCoursework.js"></script>
        <script src="src/views/helpers/semester/toggleColloquium.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/getHours.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/getLessonId.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/getThemesForEducationalDisciplineStructure.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createLessonsBlock.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createAdditionalLessonsContainer.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createLessonsContainer.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createNewLessonBlock.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createNewLesson.js"></script>
        <script src="src/views/helpers/coursework/updateAssesmentComponents.js"></script>
        <script src="src/views/helpers/coursework/removeAssesmentComponentInputs.js"></script>
        <script src="src/views/helpers/coursework/addAssesmentComponentsInputs.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateExamPoints.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateFullTotalBySemesterCell.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateTotalBySemesterCell.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateTotalByModuleCell.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateColloquiumPoints.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateGeneralPoints.js"></script>
        <script src="src/views/helpers/pointsDistribution/updateLessonPoints.js"></script>
        <script src="src/views/helpers/textEditor/initializeTextEditorForLiterature.js"></script>
        <script src="src/views/helpers/textEditor/educationalProgramGuarantorPosition.js"></script>
        <script src="src/views/helpers/textEditor/headOfDepartmentPosition.js"></script>
        <script src="src/views/helpers/textEditor/headOfCommissionPosition.js"></script>
        <script src="src/views/helpers/textEditor/approvedByPosition.js"></script>
        <script src="src/views/helpers/textEditor/initializeTextEditorsForApprovedPage.js"></script>
        <script src="src/views/helpers/textEditor/initializeTextEditor.js"></script>

        <!-- Бібліотека для інпутів із можливістю стилізації тексту -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <!-- Бібліотека для випадаючих списків з пошуком -->
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

        <!-- Змінюємо інпут для введення основної літератури -->
        <script>
            // Змінюємо інпути для введення літератури
            initializeTextEditorForLiterature({
                mainLiterature: <?php echo json_encode($details->literature->main); ?>,
                supportingLiterature: <?php echo json_encode($details->literature->supporting); ?>,
                additionalLiterature: <?php echo json_encode($details->literature->additional); ?>,
                informationResources: <?php echo json_encode($details->literature->informationResources); ?>,
                wpId: <?= htmlspecialchars($details->id) ?>
            });

            initializeTextEditorsForApprovedPage({
                educationalProgramGuarantorId: <?= isset($details->educationalProgramGuarantor) ? htmlspecialchars($details->educationalProgramGuarantor->id) : json_encode(null) ?>,
                educationalProgramGuarantorPosition: <?= isset($details->educationalProgramGuarantor) ? json_encode($details->educationalProgramGuarantor->positionAndMinutesOfMeeting) : json_encode(null) ?>,
                headOfDepartmentId: <?= isset($details->headOfDepartment) ? htmlspecialchars($details->headOfDepartment->id) : json_encode(null) ?>,
                headOfDepartmentPositionName: <?= isset($details->headOfDepartment) ? json_encode($details->headOfDepartment->positionAndMinutesOfMeeting) : json_encode(null) ?>,
                headOfCommissionId: <?= isset($details->headOfCommission) ? htmlspecialchars($details->headOfCommission->id) : json_encode(null) ?>,
                headOfCommissionPositionName: <?= isset($details->headOfCommission) ? json_encode($details->headOfCommission->positionAndMinutesOfMeeting) : json_encode(null) ?>,
                approvedById: <?= isset($details->approvedBy) ? htmlspecialchars($details->approvedBy->id) : json_encode(null) ?>,
                approvedByPositionName: <?= isset($details->approvedBy) ? json_encode($details->approvedBy->positionAndMinutesOfMeeting) : json_encode(null) ?>,
                wpId: <?= htmlspecialchars($details->id) ?>
            })
        </script>
    </main>
</body>