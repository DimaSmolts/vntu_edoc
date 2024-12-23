<?php
$title = "Методи навчання, контролю та розподіл балів";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form id="studingAndExamingMethods" class="wp-form">
    <label>Нотатки до індивідуального завдання (Розділ 10):</label>
    <!-- Створюємо контейнер для нотаток до індивідуального завдання -->
    <div id="individualTaskNotes" style="height: 100px; margin-bottom: 15px;"></div>

    <label>Методи навчання:</label>
    <!-- Створюємо контейнер для редагування методів навчання -->
    <div id="studingMethods" style="height: 100px; margin-bottom: 15px;"></div>

    <label>Методи контролю:</label>
    <!-- Створюємо контейнер для редагування методів контролю -->
    <div id="examingMethods" style="height: 100px; margin-bottom: 15px;"></div>

    <label>Методичне забезпечення:</label>
    <!-- Створюємо контейнер для редагування методичного забезпечення -->
    <div id="methodologicalSupport" style="height: 100px; margin-bottom: 15px;"></div>
</form>