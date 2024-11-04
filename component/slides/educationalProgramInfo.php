<div class="page-title-container">
    <h2 class="page-title">Загальна інформація про освітню програму</h2>
</div>
<form id="educationalProgramInfo" class="wp-form">
    <label>Кількість кредитів:
        <input type="number" id="creditsAmount" name="creditsAmount" oninput="updateGeneralInfo(event)">
    </label>
    <label>Кількість модулів:
        <input type="number" id="modulesAmount" name="modulesAmount" oninput="updateGeneralInfo(event)">
    </label>
    <label>Кількість змістових модулів:
        <input type="number" id="contentModulesAmount" name="contentModulesAmount" oninput="updateGeneralInfo(event)">
    </label>
    <label>Кількість індивідуальних завдань:
        <input type="number" id="individualTasksAmount" name="individualTasksAmount" oninput="updateGeneralInfo(event)">
    </label>
    <div class="weekly-hours-block">
        <p class="weekly-hours-label">Тижневих годин для денної форми навчання:</p>
        <label>аудиторних:
            <input type="number" id="classroomWeeklyHours" name="classroomWeeklyHours" oninput="updateGeneralInfo(event)">
        </label>
        <label>самостійної роботи студента:
            <input type="number" id="individualWeeklyHours" name="individualWeeklyHours" oninput="updateGeneralInfo(event)">
        </label>
    </div>
    <label>Мова навчання:
        <input type="text" id="language" name="language" oninput="updateGeneralInfo(event)">
    </label>
    <div>
        <p class="block-title">Характеристика навчальної дисципліни</p>
        <div class="educational-discipline-characteristic">
            <button id="fullTimeBlockBtn" class="add-new-education-form-btn" onclick="addEFForm(event, 'fullTimeBlock', 'Денна')">Додати денну форму навчання</button>
            <button id="correspondenceBlockBtn" class="add-new-education-form-btn" onclick="addEFForm(event, 'correspondenceBlock', 'Заочна')">Додати заочну форму навчання</button>
            <div id="fullTimeBlock" class="fullTimeBlock">
                <p class="subtitle">Денна форма навчання</p>
                <label>Обов'язковість ??????????:
                    <input type="text" id="mandatoring" name="mandatoring" oninput="updateEDInfo(event, 'fullTimeBlock')">
                </label>
                <label>Рік підготовки (курс):
                    <input type="number" id="year" name="year" oninput="updateEDInfo(event, 'fullTimeBlock')">
                </label>
                <label>Семестр:
                    <input type="number" id="semester" name="semester" oninput="updateEDInfo(event, 'fullTimeBlock')">
                </label>
                <label>Вид контролю:
                    <input type="number" id="examType" name="examType" oninput="updateEDInfo(event, 'fullTimeBlock')">
                </label>
            </div>
            <div id="correspondenceBlock" class="correspondenceBlock">
                <p class="subtitle">Заочна форма навчання</p>
                <label>Обов'язковість ??????????:
                    <input type="text" id="mandatoring" name="mandatoring" oninput="updateEDInfo(event, 'correspondenceBlock')">
                </label>
                <label>Рік підготовки (курс):
                    <input type="number" id="year" name="year" oninput="updateEDInfo(event, 'correspondenceBlock')">
                </label>
                <label>Семестр:
                    <input type="number" id="semester" name="semester" oninput="updateEDInfo(event, 'correspondenceBlock')">
                </label>
                <label>Вид контролю:
                    <input type="number" id="examType" name="examType" oninput="updateEDInfo(event, 'correspondenceBlock')">
                </label>
            </div>
        </div>
    </div>
</form>