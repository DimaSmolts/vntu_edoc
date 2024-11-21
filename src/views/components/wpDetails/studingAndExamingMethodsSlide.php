<?php
$title = "Передумови, мета та завдання";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="studingAndExamingMethods" class="wp-form">
    <label>Методи навчання:
        <textarea
            id="studingMethods"
            name="studingMethods"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->studingMethods ?? '') ?></textarea>
    </label>
    <label>Методи контролю:
        <textarea
            id="examingMethods"
            name="examingMethods"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->examingMethods ?? '') ?></textarea>
    </label>
</form>