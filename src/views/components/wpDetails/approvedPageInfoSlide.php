<?php
$title = "Затверження робочої програми навчальної дисципліни";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="approvedPage" class="wp-form">
    <div class="block">
        <p class="block-title">Розроблено:</p>
        <div>
            <label id="createdByPersonDropdownLabel" class="multiselect-label">Ім'я та прізвище:
                <select
                    id="createdByPersonsIdsSelect"
                    data-wpId=<?= htmlspecialchars($details->id) ?>
                    multiple
                    <?php if (!empty($details->createdByInvolvedPersonsIds)): ?> data-createdByInvolvedPersonsIds=<?= json_encode($details->createdByInvolvedPersonsIds) ?><?php endif; ?>>
                </select>
            </label>
            <div
                id="createdByAdditionalInfoBlock"
                class="created-by-info-block">
                <?php if (!empty($details->createdByPersons)): ?>
                    <?php foreach ($details->createdByPersons as $person): ?>
                        <div id="createdBy<?= htmlspecialchars($person->id) ?>AdditionalInfoBlock" class="created-by-additional-info-block">
                            <p class="mini-block-title"><?= htmlspecialchars($person->surname) ?> <?= htmlspecialchars($person->name) ?> <?= htmlspecialchars($person->patronymicName) ?></p>
                            <label>Cтупінь:
                                <input
                                    placeholder="к.т.н."
                                    type="text"
                                    name="degree"
                                    value="<?= htmlspecialchars($person->degree ?? '') ?>"
                                    oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($person->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                            </label>
                            <label>Посада:
                                <input
                                    placeholder="Доцент кафедри ТАM"
                                    type="text"
                                    name="position"
                                    value="<?= htmlspecialchars($person->position ?? '') ?>"
                                    oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($person->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Схвалено (Гарант освітньої програми):</p>
        <div
            id="educationalProgramGuarantorBlock"
            class="guarantor-info-block <?= $details->educationalProgramGuarantor ? 'involved-person-additional-info-block' : 'involved-person-info-block' ?>">
            <label>
                Ім'я та прізвище:
                <select
                    id="educationalProgramGuarantorSelect"
                    data-wpId=<?= htmlspecialchars($details->id) ?>
                    <?php if (isset($details->educationalProgramGuarantor)): ?>
                    data-educationalProgramGuarantorId=<?= json_encode($details->educationalProgramGuarantor->involvedPersonId) ?>
                    data-wpInvolvedPersonId=<?= json_encode($details->educationalProgramGuarantor->id) ?>
                    <?php endif; ?>>
                </select>
            </label>
            <?php if ($details->educationalProgramGuarantor): ?>
                <label id="educationalProgramGuarantorDegree">Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->educationalProgramGuarantor->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->educationalProgramGuarantor->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="educationalProgramGuarantorPosition">Посада:
                    <input
                        placeholder="Гарант освітньої програми, завідувач кафедри ТАМ"
                        type="text"
                        name="position"
                        value="<?= htmlspecialchars($details->educationalProgramGuarantor->position ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->educationalProgramGuarantor->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Схвалено (Зав. кафедри):</p>
        <div
            id="headOfDepartmentBlock"
            class="<?= $details->headOfDepartment ? 'involved-person-additional-info-block' : 'involved-person-info-block' ?>">
            <label>
                Ім'я та прізвище:
                <select
                    id="headOfDepartmentSelect"
                    data-wpId=<?= htmlspecialchars($details->id) ?>
                    <?php if (isset($details->headOfDepartment)): ?>
                    data-headOfDepartmentId=<?= json_encode($details->headOfDepartment->involvedPersonId) ?>
                    data-wpInvolvedPersonId=<?= json_encode($details->headOfDepartment->id) ?>
                    <?php endif; ?>>
                </select>
            </label>
            <?php if ($details->headOfDepartment): ?>
                <label id="headOfDepartmentDegree">Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->headOfDepartment->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfDepartment->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="headOfDepartmentPosition">Посада:
                    <input
                        placeholder="Завідувач кафедри ТАМ"
                        type="text"
                        name="position"
                        value="<?= htmlspecialchars($details->headOfDepartment->position ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfDepartment->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="headOfDepartmentMinutesOfMeeting">Засідання:
                    <input
                        placeholder="Засідання кафедри ТАМ"
                        type="text"
                        name="minutesOfMeeting"
                        value="<?= htmlspecialchars($details->headOfDepartment->minutesOfMeeting ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfDepartment->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Схвалено (Голова ради/комісії):</p>
        <div
            id="headOfCommissionBlock"
            class="<?= isset($details->headOfCommission) ? 'involved-person-additional-info-block' : 'involved-person-info-block' ?>">
            <label>
                Ім'я та прізвище:
                <select
                    id="headOfCommissionSelect"
                    data-wpId=<?= htmlspecialchars($details->id) ?>
                    <?php if (isset($details->headOfCommission)): ?>
                    data-headOfCommissionId=<?= json_encode($details->headOfCommission->involvedPersonId) ?>
                    data-wpInvolvedPersonId=<?= json_encode($details->headOfCommission->id) ?>
                    <?php endif; ?>>
                </select>
            </label>
            <?php if ($details->headOfCommission): ?>
                <label id="headOfCommissionDegree">Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->headOfCommission->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfCommission->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="headOfCommissionPosition">Посада:
                    <input
                        placeholder="Голова Вченої ради ФМТ"
                        type="text"
                        name="position"
                        value="<?= htmlspecialchars($details->headOfCommission->position ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfCommission->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="headOfCommissionMinutesOfMeeting">Засідання:
                    <input
                        placeholder="Вчена рада ФМТ"
                        type="text"
                        name="minutesOfMeeting"
                        value="<?= htmlspecialchars($details->headOfCommission->minutesOfMeeting ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfCommission->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Затверджено:</p>
        <div
            id="approvedByBlock"
            class="<?= isset($details->approvedBy) ? 'involved-person-additional-info-block' : 'involved-person-info-block' ?>">
            <label>
                Ім'я та прізвище:
                <select
                    id="approvedBySelect"
                    data-wpId=<?= htmlspecialchars($details->id) ?>
                    <?php if (isset($details->approvedBy)): ?>
                    data-approvedById=<?= json_encode($details->approvedBy->involvedPersonId) ?>
                    data-wpInvolvedPersonId=<?= json_encode($details->approvedBy->id) ?>
                    <?php endif; ?>>
                </select>
            </label>
            <?php if ($details->approvedBy): ?>
                <label id="approvedByDegree">Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->approvedBy->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->approvedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="approvedByPosition">Посада:
                    <input
                        placeholder="Голова Ради з якості освіти"
                        type="text"
                        name="position"
                        value="<?= htmlspecialchars($details->approvedBy->position ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->approvedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label id="approvedByMinutesOfMeeting">Засідання:
                    <input
                        placeholder="Рада з якості освіти ВНТУ"
                        type="text"
                        name="minutesOfMeeting"
                        value="<?= htmlspecialchars($details->approvedBy->minutesOfMeeting ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->approvedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
            <?php endif; ?>
        </div>
    </div>
</form>