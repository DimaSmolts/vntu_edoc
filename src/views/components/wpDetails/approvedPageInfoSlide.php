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
            <?php if (!empty($details->createdByPersons)): ?>
                <?php
                $createdByPersonsAmount = count($details->createdByPersons);
                $columnsAmountClass = 'one-column';

                if ($createdByPersonsAmount === 2) {
                    $columnsAmountClass = 'two-columns';
                } elseif ($createdByPersonsAmount >= 3) {
                    $columnsAmountClass = 'three-columns';
                }
                ?>
                <div
                    id="createdByAdditionalInfoBlock"
                    class="created-by-info-block <?= htmlspecialchars($columnsAmountClass) ?>">
                    <?php foreach ($details->createdByPersons as $person): ?>
                        <div id="createdBy<?= htmlspecialchars($person->id) ?>AdditionalInfoBlock">
                            <p class="mini-block-title"><?= htmlspecialchars($person->surname) ?> <?= htmlspecialchars($person->name) ?> <?= htmlspecialchars($person->patronymicName) ?></p>
                            <label>Cтупінь:
                                <input
                                    placeholder="к.т.н."
                                    type="text"
                                    name="degree"
                                    value="<?= htmlspecialchars($person->degree ?? '') ?>"
                                    oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($person->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                            </label>
                            <label>Посада. Протокол засідання:</label>
                            <div id="createdByPerson<?= htmlspecialchars($person->id) ?>Position" style="height: 100px">
                                <?= $person->positionAndMinutesOfMeeting ?? '' ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Схвалено (Гарант освітньої програми):</p>
        <div>
            <label id="educationalProgramGuarantorLabel">
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
                <label>Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->educationalProgramGuarantor->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->educationalProgramGuarantor->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label>Посада. Протокол засідання:</label>
                <div id="educationalProgramGuarantorPosition" style="height: 100px">
                    <?= $details->educationalProgramGuarantor->positionAndMinutesOfMeeting ?? '' ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Схвалено (Зав. кафедри):</p>
        <div>
            <label id="headOfDepartmentLabel">
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
                <label>Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->headOfDepartment->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfDepartment->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label>Посада. Протокол засідання:</label>
                <div id="headOfDepartmentPosition" style="height: 100px">
                    <?= $details->headOfDepartment->positionAndMinutesOfMeeting ?? '' ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Схвалено (Голова ради/комісії):</p>
        <div>
            <label id="headOfCommissionLabel">
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
                <label>Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->headOfCommission->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->headOfCommission->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label>Посада. Протокол засідання:</label>
                <div id="headOfCommissionPosition" style="height: 100px">
                    <?= $details->headOfCommission->positionAndMinutesOfMeeting ?? '' ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="block">
        <p class="block-title">Затверджено:</p>
        <div>
            <label id="approvedByLabel">
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
                <label>Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->approvedBy->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->approvedBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label>Посада. Протокол засідання:</label>
                <div id="approvedByPosition" style="height: 100px">
                    <?= $details->approvedBy->positionAndMinutesOfMeeting ?? '' ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>