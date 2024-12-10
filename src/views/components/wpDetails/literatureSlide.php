<?php
$title = "Рекомендована література";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>Основна:</label>
	<!-- Створюємо контейнер для редагування основної літератури -->
	<div id="main-literature-editor-container" style="height: 400px;"></div>
	<label>Допоміжна:
		<textarea
			id="supporting"
			name="supporting"
			rows="20"
			oninput="updateWPLiterature(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->literature->supporting ?? '') ?></textarea>
	</label>
	<label>Додаткова:
		<textarea
			id="additional"
			name="additional"
			rows="20"
			oninput="updateWPLiterature(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->literature->additional ?? '') ?></textarea>
	</label>
	<label>Інформаційні ресурси:
		<textarea
			id="informationResources"
			name="informationResources"
			rows="20"
			oninput="updateWPLiterature(event, <?= htmlspecialchars($details->id) ?>)"><?= htmlspecialchars($details->literature->informationResources ?? '') ?></textarea>
	</label>
</form>