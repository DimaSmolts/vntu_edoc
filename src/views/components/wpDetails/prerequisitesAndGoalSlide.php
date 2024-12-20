<?php
$title = "Передумови, мета та завдання";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="prerequisitesAndGoal" class="wp-form">
    <label>Передумови для вивчення дисципліни:</label>
    <!-- Створюємо контейнер для редагування передумов для вивчення дисципліни -->
    <div id="prerequisites" style="height: 130px; margin-bottom: 15px;"></div>

    <!-- Створюємо контейнер для редагування мети для вивчення дисципліни -->
    <label>Мета вивчення дисципліни:</label>
    <div id="goal" style="height: 100px; margin-bottom: 15px;"></div>

    <!-- Створюємо контейнер для редагування завдання дисципліни -->
    <label>Завдання дисципліни:</label>
    <div id="tasks" style="height: 100px; margin-bottom: 15px;"></div>

    <!-- Створюємо контейнер для редагування компетентностей -->
    <label>Компетентності, якими повинен оволодіти здобувач в результаті вивчення дисципліни:</label>
    <div id="competences" style="height: 200px; margin-bottom: 15px;"></div>

    <!-- Створюємо контейнер для редагування програмних результатів -->
    <label>Програмні результати:</label>
    <div id="programResults" style="height: 200px; margin-bottom: 15px;"></div>

    <!-- Створюємо контейнер для редагування контрольних заходів -->
    <label>Контрольні заходи:</label>
    <div id="controlMeasures" style="height: 100px; margin-bottom: 15px;"></div>
</form>