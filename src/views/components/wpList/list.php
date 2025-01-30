<div id="list" class="wp-list-container">
	<?php if (!empty($items)): ?>
		<ol id="listBlock">
			<div class="wp-list-item">
				<div class="wp-list-item-content wp-list-item-content-header">
					<b>Назва дисципліни</b>
					<b>Спеціальність</b>
					<b>Семестри</b>
					<b>Дата створення</b>
				</div>
			</div>
			<?php foreach ($items as $item): ?>
				<li class="wp-list-item">
					<div class="wp-list-item-content">
						<span><?= htmlspecialchars($item->disciplineName) ?></span>
						<div class="specialties-names">
							<?php if (!empty($item->specialtiesWithEducationalPrograms)): ?>
								<?php foreach ($item->specialtiesWithEducationalPrograms as $specialtiesWithEducationalPrograms): ?>
									<span>
										<?= htmlspecialchars($specialtiesWithEducationalPrograms->specialtyCode) ?> <?= htmlspecialchars($specialtiesWithEducationalPrograms->specialtyName) ?>.
										<?php foreach ($specialtiesWithEducationalPrograms->educationalPrograms as $educationalProgram): ?>
											<?= htmlspecialchars($educationalProgram->name) ?>
										<?php endforeach; ?>
									</span>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<span class="academic-year"><?= htmlspecialchars($item->semesterNumbers ?? '') ?></span>
						<span><?= htmlspecialchars($item->createdAt) ?></span>
						<a class="btn" type="button" href="wpdetails?id=<?= htmlspecialchars($item->id) ?>">Відредагувати</a>
						<button class="btn" type="button" onclick="duplicateWP(<?= htmlspecialchars($item->id) ?>)">Дублювати</button>
						<a class="btn" type="button" href="pdf?id=<?= htmlspecialchars($item->id) ?>" target="_blank">PDF</a>
						<button class="btn" type="button" onclick="openApproveDeletingModal('робочу програму', ()=>deleteWP(event, <?= htmlspecialchars($item->id) ?>))">Видалити</button>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php else: ?>
		<div class="empty-wp-list">Немає робочих програм</div>
	<?php endif; ?>
</div>