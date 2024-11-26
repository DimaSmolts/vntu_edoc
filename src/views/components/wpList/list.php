<div id="list" class="wp-list-container">
	<ol id="listBlock">
		<?php foreach ($items as $item): ?>
			<li class="wp-list-item">
				<div class="wp-list-item-content">
					<b><?= htmlspecialchars($item->disciplineName) ?></b>
					<span><?= htmlspecialchars($item->createdAt) ?></span>
					<a class="btn" type="button" href="wpdetails?id=<?= htmlspecialchars($item->id) ?>">Відредагувати</a>
					<button class="btn" type="button" onclick="duplicateWP(<?= htmlspecialchars($item->id) ?>)">Дублювати</button>
				</div>
			</li>
		<?php endforeach; ?>
	</ol>
</div>