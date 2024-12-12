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
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
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
        <script src="src/views/helpers/updating/updateFaculty.js"></script>
        <script src="src/views/helpers/deleting/deleteLesson.js"></script>
        <script src="src/views/helpers/deleting/deleteTheme.js"></script>
        <script src="src/views/helpers/deleting/deleteModule.js"></script>
        <script src="src/views/helpers/deleting/deleteSemester.js"></script>
        <script src="src/views/helpers/select/personsSelectsHandlers.js"></script>
        <script src="src/views/helpers/select/selectCreatedBy.js"></script>
        <script src="src/views/helpers/select/updateWPInvolvedPerson.js"></script>
        <script src="src/views/helpers/select/updateWPInvolvedPersonDetails.js"></script>
        <script src="src/views/helpers/select/selectEducationalProgramGuarantor.js"></script>
        <script src="src/views/helpers/select/selectNewEducationalProgramGuarantor.js"></script>
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

        <!-- Бібліотека для інпутів із можливістю стилізації тексту -->
        <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

        <!-- Бібліотека для випадаючих списків з пошуком -->
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

        <!-- Змінюємо інпут для введення основної літератури -->
        <script>
            // Імпортуємо списки з бібліотеки
            const List = Quill.import('formats/list');

            // Налаштовуємо створення списків із потрібним класом
            class CustomList extends List {
                static create(value) {
                    let node;
                    if (value === 'bullet') {
                        node = document.createElement('ul'); // Create an unordered list
                    } else if (value === 'ordered') {
                        node = document.createElement('ol'); // Create an ordered list
                        // node.classList.add('numbered-list');
                    }
                    return node;
                }

                static formats(domNode) {
                    if (domNode.tagName === 'UL') {
                        return 'bullet';
                    } else if (domNode.tagName === 'OL') {
                        return 'ordered';
                    }
                    return undefined;
                }
            }

            CustomList.blotName = 'list';
            CustomList.tagName = ['OL', 'UL']; // Handle both ordered and unordered lists
            // Реєструємо зміни у списках
            Quill.register(CustomList, true);

            // Ініціалізуємо редактор тексту
            const quill = new Quill('#main-literature-editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'], // додаємо можливості для зміни тексту
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }], // додаємо можливості для зміни списків
                        ['link'] // // додаємо можливість роботи з посиланнями
                    ]
                }
            });
            const savedContent = <?php echo json_encode($details->literature->main); ?>;

            quill.root.innerHTML = savedContent;

            quill.on('text-change', function() {
                updateWPLiterature(event, <?= htmlspecialchars($details->id) ?>, 'main', quill.root.innerHTML)
            });
        </script>
    </main>
</body>