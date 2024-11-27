<?php
$title = "Методи навчання, контролю та розподіл балів";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="studingAndExamingMethods" class="wp-form">
    <label>Нотатки до індивідуального завдання (Розділ 10):
        <textarea
            id="individualTaskNotes"
            name="individualTaskNotes"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->individualTaskNotes ?? '') ?></textarea>
    </label>
    <label>Методи навчання:
        <textarea
            id="studingMethods"
            name="studingMethods"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->studingMethods ?? '') ?></textarea>
    </label>
    <label>Методи контролю:
        <textarea
            id="controlMeasures"
            name="controlMeasures"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->examingMethods ?? '') ?></textarea>
    </label>
    <label>Методичне забезпечення:
        <textarea
            id="methodologicalSupport"
            name="methodologicalSupport"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->methodologicalSupport ?? '') ?></textarea>
    </label>
</form>