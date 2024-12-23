<div id="list" class="greeting-container">
	<p>Вітаю, <?= htmlspecialchars($creator->name) ?> <?= htmlspecialchars($creator->patronymicName) ?>!</p>
	<?php if ($showEditGlobalDataBtn): ?>
		<a class="btn" type="button" href="globalWPData">Редагувати глобальні дані</a>
	<?php endif; ?>
</div>