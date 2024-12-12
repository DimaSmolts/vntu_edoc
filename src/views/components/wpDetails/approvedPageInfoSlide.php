<?php
$title = "Затверження робочої програми навчальної дисципліни";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="approvedPage" class="wp-form">
    <!-- <div class="mini-block">
        <p class="mini-block-title">Розроблено:</p>
        <div class="micro-block">
            <?php if ($details->createdBy): ?>
                <label id="createdByGuarantorLabel">
                    Ім'я та прізвище:
                    <select
                        id="createdBySelect"
                        data-wpInvolvedPersonId="<?= htmlspecialchars($details->createdBy->id) ?>"
                        data-wpId=<?= htmlspecialchars($details->id) ?>>
                        <option
                            value=<?= htmlspecialchars($details->createdBy->id) ?>
                            selected>
                            <?= htmlspecialchars($details->createdBy->name ?? '') ?>, <?= htmlspecialchars($details->createdBy->workPosition ?? '') ?>
                        </option>
                    </select>
                </label>
                <label>Cтупінь:
                    <input
                        placeholder="к.т.н."
                        type="text"
                        name="degree"
                        value="<?= htmlspecialchars($details->createdBy->degree ?? '') ?>"
                        oninput="updateWPInvolvedPersonDetails(event, <?= htmlspecialchars($details->createdBy->id) ?>, <?= htmlspecialchars($details->id) ?>)">
                </label>
                <label>Посада. Протокол засідання:</label>
                <div id="createdByPosition" style="height: 100px">
                    <?= $details->createdBy->positionAndMinutesOfMeeting ?>
                </div>
            <?php else: ?>
                <label id="createdByLabel">
                    Ім'я та прізвище:
                    <select id="createdBySelect" data-wpId=<?= htmlspecialchars($details->id) ?>></select>
                </label>
            <?php endif; ?>
        </div>
    </div> -->
    <div class="mini-block">
        <p class="mini-block-title">Схвалено (Гарант освітньої програми):</p>
        <div class="micro-block">
            <?php if ($details->educationalProgramGuarantor): ?>
                <label id="educationalProgramGuarantorLabel">
                    Ім'я та прізвище:
                    <select
                        id="educationalProgramGuarantorSelect"
                        data-wpInvolvedPersonId="<?= htmlspecialchars($details->educationalProgramGuarantor->id) ?>"
                        data-wpId=<?= htmlspecialchars($details->id) ?>>
                        <option
                            value=<?= htmlspecialchars($details->educationalProgramGuarantor->id) ?>
                            selected>
                            <?= htmlspecialchars($details->educationalProgramGuarantor->name ?? '') ?>, <?= htmlspecialchars($details->educationalProgramGuarantor->workPosition ?? '') ?>
                        </option>
                    </select>
                </label>
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
                    <?= $details->educationalProgramGuarantor->positionAndMinutesOfMeeting ?>
                </div>
            <?php else: ?>
                <label id="educationalProgramGuarantorLabel">
                    Ім'я та прізвище:
                    <select id="educationalProgramGuarantorSelect" data-wpId=<?= htmlspecialchars($details->id) ?>></select>
                </label>
            <?php endif; ?>
        </div>
    </div>
    <div class="mini-block">
        <p class="mini-block-title">Схвалено (Зав. кафедри):</p>
        <div class="micro-block">
            <?php if ($details->headOfDepartment): ?>
                <label id="headOfDepartmentLabel">
                    Ім'я та прізвище:
                    <select
                        id="headOfDepartmentSelect"
                        data-wpInvolvedPersonId="<?= htmlspecialchars($details->headOfDepartment->id) ?>"
                        data-wpId=<?= htmlspecialchars($details->id) ?>>
                        <option
                            value=<?= htmlspecialchars($details->headOfDepartment->id) ?>
                            selected>
                            <?= htmlspecialchars($details->headOfDepartment->name ?? '') ?>, <?= htmlspecialchars($details->headOfDepartment->workPosition ?? '') ?>
                        </option>
                    </select>
                </label>
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
                    <?= $details->headOfDepartment->positionAndMinutesOfMeeting ?>
                </div>
            <?php else: ?>
                <label id="headOfDepartmentLabel">
                    Ім'я та прізвище:
                    <select id="headOfDepartmentSelect" data-wpId=<?= htmlspecialchars($details->id) ?>></select>
                </label>
            <?php endif; ?>
        </div>
    </div>
    <div class="mini-block">
        <p class="mini-block-title">Схвалено (Голова ради/комісії):</p>
        <div class="micro-block">
            <?php if ($details->headOfCommission): ?>
                <label id="headOfCommissionLabel">
                    Ім'я та прізвище:
                    <select
                        id="headOfCommissionSelect"
                        data-wpInvolvedPersonId="<?= htmlspecialchars($details->headOfCommission->id) ?>"
                        data-wpId=<?= htmlspecialchars($details->id) ?>>
                        <option
                            value=<?= htmlspecialchars($details->headOfCommission->id) ?>
                            selected>
                            <?= htmlspecialchars($details->headOfCommission->name ?? '') ?>, <?= htmlspecialchars($details->headOfCommission->workPosition ?? '') ?>
                        </option>
                    </select>
                </label>
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
                    <?= $details->headOfCommission->positionAndMinutesOfMeeting ?>
                </div>
            <?php else: ?>
                <label id="headOfCommissionLabel">
                    Ім'я та прізвище:
                    <select id="headOfCommissionSelect" data-wpId=<?= htmlspecialchars($details->id) ?>></select>
                </label>
            <?php endif; ?>
        </div>
    </div>
    <div class="mini-block">
        <p class="mini-block-title">Затверджено:</p>
        <div class="micro-block">
            <?php if ($details->approvedBy): ?>
                <label id="approvedByLabel">
                    Ім'я та прізвище:
                    <select
                        id="approvedBySelect"
                        data-wpInvolvedPersonId="<?= htmlspecialchars($details->approvedBy->id) ?>"
                        data-wpId=<?= htmlspecialchars($details->id) ?>>
                        <option
                            value=<?= htmlspecialchars($details->approvedBy->id) ?>
                            selected>
                            <?= htmlspecialchars($details->approvedBy->name ?? '') ?>, <?= htmlspecialchars($details->approvedBy->workPosition ?? '') ?>
                        </option>
                    </select>
                </label>
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
                    <?= $details->approvedBy->positionAndMinutesOfMeeting ?>
                </div>
            <?php else: ?>
                <label id="approvedByLabel">
                    Ім'я та прізвище:
                    <select id="approvedBySelect" data-wpId=<?= htmlspecialchars($details->id) ?>></select>
                </label>
            <?php endif; ?>
        </div>
    </div>
</form>