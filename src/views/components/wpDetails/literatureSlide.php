<?php
$title = "Рекомендована література";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>Основна:</label>
	<!-- Створюємо контейнер для редагування основної літератури -->
	<div id="main-literature-editor-container" style="height: 400px; margin-bottom: 15px;"></div>
	<label class="margin-top">Допоміжна:</label>
	<!-- Створюємо контейнер для редагування допоміжної літератури -->
	<div id="supporting-literature-editor-container" style="height: 400px; margin-bottom: 15px;"></div>
	<label class="margin-top">Додаткова:</label>
	<!-- Створюємо контейнер для редагування додаткової літератури -->
	<div id="additional-literature-editor-container" style="height: 400px; margin-bottom: 15px;"></div>
	<label class="margin-top">Інформаційні ресурси:</label>
	<!-- Створюємо контейнер для редагування інформаційні ресурсів -->
	<div id="information-resources-editor-container" style="height: 400px; margin-bottom: 15px;"></div>
</form>