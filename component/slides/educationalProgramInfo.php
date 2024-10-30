<h2>Загальна інформація про освітню програму</h2>
<form id="educationalProgramInfo">
    <label>Кількість кредитів:
        <input type="number" id="creditsAmount" name="creditsAmount" oninput="saveInfo(event)">
    </label>
    <label>Кількість модулів:
        <input type="number" id="modulesAmount" name="modulesAmount" oninput="saveInfo(event)">
    </label>
    <label>Кількість змістових модулів:
        <input type="number" id="contentModulesAmount" name="contentModulesAmount" oninput="saveInfo(event)">
    </label>
    <label>Кількість індивідуальних завдань:
        <input type="number" id="individualTasksAmount" name="individualTasksAmount" oninput="saveInfo(event)">
    </label>
    <div>
        <p class="block-title">Характеристика навчальної дисципліни</p>
        <div class="educational-discipline-characteristic">
            <div>
                <p class="subtitle">Денна форма навчання</p>
                <label>Обов'язковість ??????????:
                    <input type="text" id="isFullTimeEFMandatory" name="isFullTimeEFMandatory" oninput="saveInfo(event)">
                </label>
                <label>Рік підготовки (курс):
                    <input type="number" id="fullTimeEFYear" name="fullTimeEFYear" oninput="saveInfo(event)">
                </label>
                <label>Семестр:
                    <input type="number" id="fullTimeEFSemester" name="fullTimeEFSemester" oninput="saveInfo(event)">
                </label>
                <label>Вид контролю:
                    <input type="number" id="fullTimeEFExamType" name="fullTimeEFExamType" oninput="saveInfo(event)">
                </label>
            </div>
            <div>
                <p class="subtitle">Заочна форма навчання</p>
                <label>Обов'язковість ??????????:
                    <input type="text" id="isExtramuralEFMandatory" name="isExtramuralEFMandatory" oninput="saveInfo(event)">
                </label>
                <label>Рік підготовки (курс):
                    <input type="number" id="extramuralEFYear" name="extramuralEFYHear" oninput="saveInfo(event)">
                </label>
                <label>Семестр:
                    <input type="number" id="extramuralEFSemester" name="extramuralEFSemester" oninput="saveInfo(event)">
                </label>
                <label>Вид контролю:
                    <input type="number" id="extramuralEFExamType" name="extramuralEFExamType" oninput="saveInfo(event)">
                </label>
            </div>
        </div>
    </div>
</form>