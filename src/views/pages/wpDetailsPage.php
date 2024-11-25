<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/views/styles/common.css">
    <link rel="stylesheet" href="src/views/styles/carousel.css">
    <link rel="stylesheet" href="src/views/styles/form.css">
    <link rel="stylesheet" href="src/views/styles/semester.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../components/wpDetails/carousel.php'; ?>

        <script src="src/views/constants/EducationalFormName.js"></script>
        <script src="src/views/constants/LessonTypesName.js"></script>
        <script src="src/views/helpers/view/createElement.js"></script>
        <script src="src/views/helpers/view/createLabelWithInput.js"></script>
        <script src="src/views/helpers/view/createLabelWithTextarea.js"></script>
        <script src="src/views/helpers/view/createLabelWithCheckbox.js"></script>
        <script src="src/views/helpers/updating/updateWP.js"></script>
        <script src="src/views/helpers/updating/updateGeneralInfo.js"></script>
        <script src="src/views/helpers/carousel/arrowsHandler.js"></script>
        <script src="src/views/helpers/updating/updateSemesterInfo.js"></script>
        <script src="src/views/helpers/updating/updateModuleInfo.js"></script>
        <script src="src/views/helpers/updating/updateThemeInfo.js"></script>
        <script src="src/views/helpers/updating/updateLessonInfo.js"></script>
        <script src="src/views/helpers/updating/updateHours.js"></script>
        <script src="src/views/helpers/deleting/deleteLesson.js"></script>
        <script src="src/views/helpers/deleting/deleteTheme.js"></script>
        <script src="src/views/helpers/deleting/deleteModule.js"></script>
        <script src="src/views/helpers/deleting/deleteSemester.js"></script>
        <script src="src/views/helpers/search/teacher.js"></script>
        <script src="src/views/helpers/semester/buttonsHandlers.js"></script>
        <script src="src/views/helpers/semester/addNewSemester.js"></script>
        <script src="src/views/helpers/semester/addNewModule.js"></script>
        <script src="src/views/helpers/semester/addNewTheme.js"></script>
        <script src="src/views/helpers/semester/createSemesterContainer.js"></script>
        <script src="src/views/helpers/semester/createModuleBlock.js"></script>
        <script src="src/views/helpers/semester/createThemeBlock.js"></script>
        <script src="src/views/helpers/semester/updateNumberInput.js"></script>
        <script src="src/views/helpers/semester/toggleEducationalForm.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/getHours.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/getLessonId.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/getThemesForEducationalDisciplineStructure.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createLessonsBlock.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createAdditionalLessonsContainer.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createLessonsContainer.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createNewLessonBlock.js"></script>
        <script src="src/views/helpers/educationalDisciplineStructure/createNewLesson.js"></script>
    </main>
</body>