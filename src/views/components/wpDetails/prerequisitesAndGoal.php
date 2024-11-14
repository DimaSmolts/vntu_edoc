<?php
$title = "Передумови, мета та завдання";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="prerequisitesAndGoal" class="wp-form">
    <label>Передумови для вивчення дисципліни:
        <textarea
            id="prerequisites"
            name="prerequisites"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->prerequisites ?? '') ?></textarea>
    </label>
    <label>Мета вивчення дисципліни:
        <textarea
            id="goal"
            name="goal"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->goal ?? '') ?></textarea>
    </label>
    <label>Завдання дисципліни:
        <textarea
            id="tasks"
            name="tasks"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->tasks ?? '') ?></textarea>
    </label>
    <label>Компетентності, якими повинен оволодіти здобувач в результаті вивчення дисципліни:
        <textarea
            id="competences"
            name="competences"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->competences ?? '') ?></textarea>
    </label>
    <label>Програмні результати:
        <textarea
            id="programResults"
            name="programResults"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->programResults ?? '') ?></textarea>
    </label>
    <label>Контрольні заходи:
        <textarea
            id="controlMeasures"
            name="controlMeasures"
            rows="10"
            oninput="updateGeneralInfo(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->controlMeasures ?? '') ?></textarea>
    </label>
</form>