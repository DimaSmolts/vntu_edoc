<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Деталі</title>
    <link rel="stylesheet" href="src/views/styles/common.css">
    <link rel="stylesheet" href="src/views/styles/carousel.css">
    <link rel="stylesheet" href="src/views/styles/form.css">
    <link rel="stylesheet" href="src/views/styles/semester.css">
    <link rel="stylesheet" href="src/views/styles/validationBlock.css">
    <!-- Бібліотека для інпутів із можливістю стилізації тексту -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <!-- Бібліотека для випадаючих списків з пошуком -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
</head>

<body class="details" id="detailsBody">
    <?php include __DIR__ . '/../components/validationBlock/validationBlock.php'; ?>
    <main class="container">
        <?php include __DIR__ . '/../components/wpDetails/carousel.php'; ?>
        <?php include __DIR__ . '/../components/wpDetails/deletingModal.php'; ?>
    </main>
    <embed id="pdfPreview" src="https://iq.sdev.vntu.vn.ua/workingPrograms/pdf?id=<?= htmlspecialchars($details->id) ?>#view=FitH" width="100%" height="100%" />
    <script src="src/views/helpers/wplist/logins.js"></script>
    <script src="src/views/helpers/requests/makeGetRequestAndReturnData.js"></script>
    <script src="src/views/helpers/requests/makePostRequest.js"></script>
    <script src="src/views/helpers/requests/makePostRequestAndReturnData.js"></script>
    <script src="src/views/helpers/requests/makeDeleteRequest.js"></script>
    <script src="src/views/helpers/requests/makeDeleteRequestAndReturnData.js"></script>
    <script src="src/views/constants/EducationalFormName.js"></script>
    <script src="src/views/constants/LessonTypesName.js"></script>
    <script src="src/views/helpers/modal/openApproveDeletingModal.js"></script>
    <script src="src/views/helpers/view/createElement.js"></script>
    <script src="src/views/helpers/view/createLabelWithInput.js"></script>
    <script src="src/views/helpers/view/createLabelWithTextarea.js"></script>
    <script src="src/views/helpers/view/createCheckboxWithLabelAtTheEnd.js"></script>
    <script src="src/views/helpers/view/createCheckboxWithLabelAtTheBeginning.js"></script>
    <script src="src/views/helpers/view/createSlide.js"></script>
    <script src="src/views/helpers/view/updateWPFormHeight.js"></script>
    <script src="src/views/helpers/view/updatePDF.js"></script>
    <script src="src/views/helpers/updating/updateWP.js"></script>
    <script src="src/views/helpers/updating/updateGeneralInfo.js"></script>
    <script src="src/views/helpers/carousel/arrowsHandler.js"></script>
    <script src="src/views/helpers/carousel/getStructureForAssessmentCriteriasSlides.js"></script>
    <script src="src/views/helpers/carousel/addAssessmentCriteriasSlides.js"></script>
    <script src="src/views/helpers/carousel/getCourseworkSlide.js"></script>
    <script src="src/views/helpers/carousel/getPointsDistributionSlide.js"></script>
    <script src="src/views/helpers/carousel/getEducationalDisciplineSemesterControlMethodsSlide.js"></script>
    <script src="src/views/helpers/carousel/getSelfworkSlide.js"></script>
    <script src="src/views/helpers/updating/updateSemesterInfo.js"></script>
    <script src="src/views/helpers/updating/updateModuleInfo.js"></script>
    <script src="src/views/helpers/updating/updateThemeInfo.js"></script>
    <script src="src/views/helpers/updating/updateLessonInfo.js"></script>
    <script src="src/views/helpers/updating/updateHours.js"></script>
    <script src="src/views/helpers/updating/updateWorkingProgramGlobalDataOverwrite.js"></script>
    <script src="src/views/helpers/updating/updateWPLiterature.js"></script>
    <script src="src/views/helpers/deleting/deleteLesson.js"></script>
    <script src="src/views/helpers/deleting/deleteTheme.js"></script>
    <script src="src/views/helpers/deleting/deleteModule.js"></script>
    <script src="src/views/helpers/deleting/deleteSemester.js"></script>
    <script src="src/views/helpers/selectDropdowns/createNewSelect.js"></script>
    <script src="src/views/helpers/selectDropdowns/createNewSelectWithSearch.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchTeachers.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchTeacherById.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchTeachersByIds.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchFaculties.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchDepartments.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchDepartmentsById.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchStydingLevelTypes.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchSpecialties.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchSpecialtiesByIds.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchEducationalPrograms.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchEducationalProgramsByIds.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchExamTypes.js"></script>
    <script src="src/views/helpers/selectDropdowns/fetch/fetchAdditionalTasks.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/involvedPersonSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/createdByPersonsSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/educationalProgramGuarantorSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/headOfDepartmentSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/headOfCommissionSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/approvedBySelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/docApprovedBySelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/facultySelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/departmentSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/stydingLevelSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/specialtySelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/educationalProgramSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/examTypeSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectHandlers/additionalTaskSelectHandler.js"></script>
    <script src="src/views/helpers/selectDropdowns/initializeSelectHandlers.js"></script>
    <script src="src/views/helpers/selectDropdowns/updateWPInvolvedPerson.js"></script>
    <script src="src/views/helpers/selectDropdowns/updateWPInvolvedPersonDetails.js"></script>
    <script src="src/views/helpers/selectDropdowns/removeWPInvolvedPerson.js"></script>
    <script src="src/views/helpers/selectDropdowns/select/selectCreatedBy.js"></script>
    <script src="src/views/helpers/selectDropdowns/select/selectEducationalProgramGuarantor.js"></script>
    <script src="src/views/helpers/selectDropdowns/select/selectHeadOfDepartment.js"></script>
    <script src="src/views/helpers/selectDropdowns/select/selectHeadOfCommission.js"></script>
    <script src="src/views/helpers/selectDropdowns/select/selectApprovedBy.js"></script>
    <script src="src/views/helpers/selectDropdowns/select/selectDocApprovedBy.js"></script>
    <script src="src/views/helpers/selectDropdowns/selectNew/selectNewCreatedBy.js"></script>
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
    <script src="src/views/helpers/semester/checkTogglingIndividualTask.js"></script>
    <script src="src/views/helpers/semester/checkTogglingModuleTasks.js"></script>
    <script src="src/views/helpers/semester/createSemesterContainer.js"></script>
    <script src="src/views/helpers/semester/createModuleBlock.js"></script>
    <script src="src/views/helpers/semester/createThemeBlock.js"></script>
    <script src="src/views/helpers/semester/updateNumberInput.js"></script>
    <script src="src/views/helpers/semester/toggleEducationalForm.js"></script>
    <script src="src/views/helpers/semester/toggleIndividualTask.js"></script>
    <script src="src/views/helpers/semester/toggleModuleTask.js"></script>
    <script src="src/views/helpers/semester/createAdditionalTask.js"></script>
    <script src="src/views/helpers/semester/deleteAdditionalTask.js"></script>
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
    <script src="src/views/helpers/pointsDistribution/updateControlWorkPoints.js"></script>
    <script src="src/views/helpers/pointsDistribution/updateGeneralPoints.js"></script>
    <script src="src/views/helpers/pointsDistribution/updateLessonPoints.js"></script>
    <script src="src/views/helpers/pointsDistribution/updateSemesterPointsDistribution.js"></script>
    <script src="src/views/helpers/pointsDistribution/updateModuleTaskPoints.js"></script>
    <script src="src/views/helpers/pointsDistribution/updateTaskPoints.js"></script>
    <script src="src/views/helpers/textEditor/initializeTextEditorWithoutToolbarWithListAndLink.js"></script>
    <script src="src/views/helpers/textEditor/initializeTextEditorWithoutToolbar.js"></script>
    <script src="src/views/helpers/textEditor/initializeTextEditor.js"></script>
    <script src="src/views/helpers/textEditor/initializeTextEditorForLiterature.js"></script>
    <script src="src/views/helpers/textEditor/initializeTextEditorForPrerequisitesAndGoal.js"></script>
    <script src="src/views/helpers/textEditor/initializeTextEditorForStudingAndExamingMethods.js"></script>
    <script src="src/views/helpers/semesterControlMethods/createNewAdditionalTasks.js"></script>
    <script src="src/views/helpers/selfwork/updateTaskHours.js"></script>
    <script src="src/views/helpers/selfwork/updateLessonSelfworkHours.js"></script>
    <script src="src/views/helpers/selfwork/updateSelfworkTheme.js"></script>
    <script src="src/views/helpers/selfwork/updateSelfworkHours.js"></script>
    <script src="src/views/helpers/selfwork/deleteSelfworkTheme.js"></script>
    <script src="src/views/helpers/selfwork/addNewSelfworkThemeRow.js"></script>
    <script src="src/views/helpers/selfwork/addNewSelfworkTheme.js"></script>
    <script src="src/views/helpers/maps/getEducationFormNameById.js"></script>
    <script src="src/views/helpers/maps/getLessonTypeIdByName.js"></script>
    <script src="src/views/helpers/maps/getLessonTypeNameById.js"></script>
    <script src="src/views/helpers/validation/addWarning.js"></script>
    <script src="src/views/helpers/validation/removeWarning.js"></script>
    <script src="src/views/helpers/validation/validateSelfworkHours.js"></script>
    <script src="src/views/helpers/validation/validateLessonSelfworkHours.js"></script>
    <script src="src/views/helpers/validation/validateAdditionalTasksSelfworkHours.js"></script>
    <script src="src/views/helpers/validation/calculationAndGraphicTypeTaskSelfworkHours.js"></script>
    <script src="src/views/helpers/validation/validateModuleControlSelfworkHours.js"></script>
    <script src="src/views/helpers/validation/runValidation.js"></script>
    <script src="src/views/helpers/validation/updateValidation.js"></script>
    <script src="src/views/helpers/validation/globalVariables.js"></script>
    <script src="src/views/helpers/validation/renderValidationWarnings.js"></script>

    <!-- Бібліотека для інпутів із можливістю стилізації тексту -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <!-- Бібліотека для випадаючих списків з пошуком -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Змінюємо інпут для введення основної літератури -->
    <script>
        const validationMap = new Map();

        // Custom event emitter for validation errors
        const validationWarningsEventTarget = new EventTarget();

        function dispatchValidationWarningsChange() {
            const event = new Event('validationWarningsChange');
            validationWarningsEventTarget.dispatchEvent(event);
        }

        validationWarningsEventTarget.addEventListener('validationWarningsChange', renderValidationWarnings);

        runValidation({
            selfworkData: <?php echo json_encode($selfworkData); ?>
        })

        <?php
        $semestersIds = [];

        foreach ($details->semesters as $semester) {
            $semestersIds[] = $semester->id;
        }
        ?>

        initializeSelectHandlers({
            semestersIds: <?php echo json_encode(!empty($semestersIds) ? $semestersIds : null); ?>,
        })

        initializeTextEditorForPrerequisitesAndGoal({
            notes: <?php echo json_encode($details->notes ?? ''); ?>,
            prerequisites: <?php echo json_encode($details->prerequisites ?? ''); ?>,
            goal: <?php echo json_encode($details->goal ?? ''); ?>,
            tasks: <?php echo json_encode($details->tasks ?? ''); ?>,
            competences: <?php echo json_encode($details->competences ?? ''); ?>,
            programResults: <?php echo json_encode($details->programResults ?? ''); ?>,
            controlMeasures: <?php echo json_encode($details->controlMeasures ?? ''); ?>,
            wpId: <?= htmlspecialchars($details->id) ?>
        })

        initializeTextEditorForStudingAndExamingMethods({
            individualTaskNotes: <?php echo json_encode($details->individualTaskNotes ?? ''); ?>,
            studingMethods: <?php echo json_encode($details->studingMethods ?? ''); ?>,
            examingMethods: <?php echo json_encode($details->examingMethods ?? ''); ?>,
            methodologicalSupport: <?php echo json_encode($details->methodologicalSupport ?? ''); ?>,
            wpId: <?= htmlspecialchars($details->id) ?>
        })

        // Змінюємо інпути для введення літератури
        initializeTextEditorForLiterature({
            mainLiterature: <?php echo json_encode($details->literature->main ?? ''); ?>,
            supportingLiterature: <?php echo json_encode($details->literature->supporting ?? ''); ?>,
            additionalLiterature: <?php echo json_encode($details->literature->additional ?? ''); ?>,
            informationResources: <?php echo json_encode($details->literature->informationResources ?? ''); ?>,
            wpId: <?= htmlspecialchars($details->id) ?>
        });

        function debounce(func, delay) {
            let timer;
            return function(...args) {
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(this, args), delay);
            };
        }

        const debouncedHandleInput = debounce(updatePDF, 3000);
    </script>
</body>