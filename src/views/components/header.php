<div class="page-title-container">
	<?php if ($showReturnBtn): ?>
		<a class="btn to-list-btn" type="button" href="wplist">До списку</a>
	<?php endif; ?>
	<?php if ($isAbleToEditGlobalData): ?>
		<a class="btn edit-global-btn" type="button" href="globalWPData">Редагувати глобальні дані</a>
	<?php endif; ?>
	<h2 class="page-title"><?= htmlspecialchars($title) ?></h2>
</div>