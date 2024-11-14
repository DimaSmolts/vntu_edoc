<?php
$title = "Затверження робочої програми навчальної дисципліни";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="approvedPage" class="wp-form">
    <div class="mini-block">
        <p class="mini-block-title">Розроблено:</p>
        <div class="micro-block">
            <?php if (isset($createdBy->workingProgramInvolvedPersonsId)): ?>
                <select
                    id="teacherDropdown"
                    onchange="selectCreatedBy(<?= htmlspecialchars($createdBy->workingProgramInvolvedPersonsId) ?>, value, <?= htmlspecialchars($details->id) ?>)">
                    <?php foreach ($persons as $person): ?>
                        <option value="<?= htmlspecialchars($person->id) ?>" <?php if ($person->id == $createdBy->involvedPersonId): ?>selected<?php endif; ?>>
                            <?= htmlspecialchars($person->surname) ?> <?= htmlspecialchars($person->name) ?> <?= htmlspecialchars($person->patronymicName) ?>, <?= htmlspecialchars($person->degree) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <select
                    id="teacherDropdown"
                    onchange="selectCreatedBy(null, value, <?= htmlspecialchars($details->id) ?>)">
                    <option></option>
                    <?php foreach ($persons as $person): ?>
                        <option value="<?= htmlspecialchars($person->id) ?>">
                            <?= htmlspecialchars($person->surname) ?> <?= htmlspecialchars($person->name) ?> <?= htmlspecialchars($person->patronymicName) ?>, <?= htmlspecialchars($person->degree) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
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