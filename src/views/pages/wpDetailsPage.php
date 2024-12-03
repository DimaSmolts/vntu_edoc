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
        <script src="src/views/helpers/view/createLabelWithCheckbox.js"></script>
        <script src="src/views/helpers/view/createSlide.js"></script>
        <script src="src/views/helpers/updating/updateWP.js"></script>
        <script src="src/views/helpers/updating/updateGeneralInfo.js"></script>
        <script src="src/views/helpers/carousel/arrowsHandler.js"></script>
        <script src="src/views/helpers/carousel/getStructureForAssessmentCriteriasSlides.js"></script>
        <script src="src/views/helpers/carousel/addAssessmentCriteriasSlides.js"></script>
        <script src="src/views/helpers/carousel/getCourseworkSlide.js"></script>
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
        <script src="src/views/helpers/search/teacher.js"></script>
        <script src="src/views/helpers/semester/buttonsHandlers.js"></script>
        <script src="src/views/helpers/semester/addNewSemester.js"></script>
        <script src="src/views/helpers/semester/addNewModule.js"></script>
        <script src="src/views/helpers/semester/addNewTheme.js"></script>
        <script src="src/views/helpers/semester/checkTogglingEducationalForm.js"></script>
        <script src="src/views/helpers/semester/checkTogglingCoursework.js"></script>
        <script src="src/views/helpers/semester/createSemesterContainer.js"></script>
        <script src="src/views/helpers/semester/createModuleBlock.js"></script>
        <script src="src/views/helpers/semester/createThemeBlock.js"></script>
        <script src="src/views/helpers/semester/updateNumberInput.js"></script>
        <script src="src/views/helpers/semester/toggleEducationalForm.js"></script>
        <script src="src/views/helpers/semester/toggleCoursework.js"></script>
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
    </main>
</body>