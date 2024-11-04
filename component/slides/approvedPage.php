<div class="page-title-container">
    <h2 class="page-title">Затверження робочої програми навчальної дисципліни</h2>
</div>
<form id="approvedPage" class="wp-form">
    <div class="mini-block">
        <p class="mini-block-title">Розроблено:</p>
        <div class="micro-block">
            <select id="teacherDropdown" onchange="selectTeacher(value)"></select>
        </div>
    </div>
    <div class="mini-block">
        <p class="mini-block-title">Схвалено:</p>
        <div class="micro-block">
            <label>Посада:
                <input placeholder="Посада" type="text" id="epApprovedFirstByPosition"
                    name="epApprovedFirstByPosition" oninput="updateGeneralInfo(event)">
            </label>
            <label>Cтупінь:
                <input placeholder="к.т.н., доцент" type="text" id="epApprovedFirstByDegree"
                    name="epApprovedFirstByDegree" oninput="updateGeneralInfo(event)">
            </label>
            <label>Ім'я та прізвище:
                <input placeholder="Іван Іванов" type="text" id="epApprovedFirstByName"
                    name="epApprovedFirstByName" oninput="updateGeneralInfo(event)">
            </label>
        </div>
        <div class="micro-block">
            <label>Посада:
                <input placeholder="Посада" type="text" id="epApprovedSecondByPosition"
                    name="epApprovedSecondByPosition" oninput="updateGeneralInfo(event)">
            </label>
            <label>Cтупінь:
                <input placeholder="к.т.н., доцент" type="text" id="epApprovedSecondByDegree"
                    name="epApprovedSecondByDegree" oninput="updateGeneralInfo(event)">
            </label>
            <label>Ім'я та прізвище:
                <input placeholder="Іван Іванов" type="text" id="epApprovedSecondByName"
                    name="epApprovedSecondByName" oninput="updateGeneralInfo(event)">
            </label>
        </div>
        <div class="micro-block">
            <label>Посада:
                <input placeholder="Посада" type="text" id="epApprovedThirdByPosition"
                    name="epApprovedThirdByPosition" oninput="updateGeneralInfo(event)">
            </label>
            <label>Cтупінь:
                <input placeholder="к.т.н., доцент" type="text" id="epApprovedThirdByDegree"
                    name="epApprovedThirdByDegree" oninput="updateGeneralInfo(event)">
            </label>
            <label>Ім'я та прізвище:
                <input placeholder="Іван Іванов" type="text" id="epApprovedThirdByName"
                    name="epApprovedThirdByName" oninput="updateGeneralInfo(event)">
            </label>
        </div>
    </div>
    <div class="mini-block">
        <p class="mini-block-title">Затверджено:</p>
        <div class="micro-block">
            <label>Посада:
                <input placeholder="Посада" type="text" id="epApprovedTotallyByPosition"
                    name="epApprovedTotallyByPosition" oninput="updateGeneralInfo(event)">
            </label>
            <label>Cтупінь:
                <input placeholder="к.т.н., доцент" type="text" id="epApprovedTotallyByDegree"
                    name="epApprovedTotallyByDegree" oninput="updateGeneralInfo(event)">
            </label>
            <label>Ім'я та прізвище:
                <input placeholder="Іван Іванов" type="text" id="epApprovedTotallyByName"
                    name="epApprovedTotallyByName" oninput="updateGeneralInfo(event)">
            </label>
        </div>
    </div>
</form>