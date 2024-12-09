<div class="topic-title">
	4. Програма навчальної дисципліни
</div>
<?php if (!empty($details->semesters)): ?>
	<?php foreach ($details->semesters as $semesterData): ?>
		<?php if (!empty($semesterData->modules)): ?>
			<?php foreach ($semesterData->modules as $moduleData): ?>
				<p class="inserted indent bold justify">
					Змістовий модуль <?= htmlspecialchars($moduleData->moduleNumber) ?>. <?= htmlspecialchars($moduleData->moduleName) ?>.
				</p>
				<?php if (!empty($moduleData->themes)): ?>
					<?php foreach ($moduleData->themes as $themeData): ?>
						<p class="indent inserted justify">
							<span class="inserted bold italic">Тема <?= htmlspecialchars($themeData->themeNumber) ?>. <?= htmlspecialchars($themeData->name) ?>.</span>
							<?= htmlspecialchars($themeData->description) ?>.
						</p>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>