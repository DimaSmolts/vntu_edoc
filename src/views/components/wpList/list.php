<div id="list" class="wp-list-container">
	<ol>
		<?php foreach ($items as $item): ?>
			<li class="wp-list-item">
				<div class="wp-list-item-content">
					<b><?= htmlspecialchars($item->disciplineName) ?></b>
					<span><?= htmlspecialchars($item->createdAt) ?></span>
					<a class="btn" type="button" href="wpdetails?id=<?= htmlspecialchars($item->id) ?>">Відредагувати</a>
				</div>
			</li>
		<?php endforeach; ?>
	</ol>
</div>