<div id="list" class="wp-list-container">
	<?php if (!empty($items)): ?>
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
						<div class="specialties-names">
							<?php if (!empty($item->specialtiesNames)): ?>
								<?php foreach ($item->specialtiesNames as $specialtyName): ?>
									<span><?= htmlspecialchars($specialtyName) ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<span class="academic-year"><?= isset($item->academicYear) ? htmlspecialchars($item->academicYear) : "" ?></span>
						<span><?= htmlspecialchars($item->createdAt) ?></span>
						<a class="btn" type="button" href="wpdetails?id=<?= htmlspecialchars($item->id) ?>">Відредагувати</a>
						<button class="btn" type="button" onclick="duplicateWP(<?= htmlspecialchars($item->id) ?>)">Дублювати</button>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php else: ?>
		<div class="empty-wp-list">Немає робочих програм</div>
	<?php endif; ?>
</div>