<div id="list" class="wp-list-container">
	<ol id="listBlock">
		<div class="wp-list-item">
			<div class="wp-list-item-content wp-list-item-content-header">
				<b>Назва дисципліни</b>
				<b>Спеціальність</b>
				<b>Рік навчання</b>
				<b>Дата створення</b>
			</div>
		</div>
		<?php foreach ($items as $item): ?>
			<li class="wp-list-item">
				<div class="wp-list-item-content">
					<span><?= htmlspecialchars($item->disciplineName) ?></span>
					<span><?= isset($item->specialtyName) ? htmlspecialchars($item->specialtyName) : "" ?></span>
					<span class="academic-year"><?= isset($item->academicYear) ? htmlspecialchars($item->academicYear) : "" ?></span>
					<span><?= htmlspecialchars($item->createdAt) ?></span>
					<a class="btn" type="button" href="wpdetails?id=<?= htmlspecialchars($item->id) ?>">Відредагувати</a>
					<button class="btn" type="button" onclick="duplicateWP(<?= htmlspecialchars($item->id) ?>)">Дублювати</button>
				</div>
			</li>
		<?php endforeach; ?>
	</ol>
</div>