<?php
$title = "Курсовий. Складові оцінювання.";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<?php foreach ($semesters as $semester): ?>
		<?php if ($semester->isExists): ?>
			<div class="coursework-container">
				<p id="semesterTitle<?= htmlspecialchars($semester->semesterId) ?>" class="block-title">
					<?= htmlspecialchars($semester->taskTypeName ?? '') ?> до семестру <?= $semester->semesterNumber ? htmlspecialchars($semester->semesterNumber) : "" ?> (<?= htmlspecialchars($semester->hours ?? '0') ?> годин)
				</p>

				<div class="coursework-assesment-components-block" id="assesmentComponents<?= htmlspecialchars($semester->semesterId) ?>">
					<p class="coursework-assesment-components-block-title">Складові оцінювання:</p>
					<label>Назва складової:</label>
					<label>Бали: <?= htmlspecialchars($semester->taskTypeId) ?></label>

					<?php if (isset($semester->assessmentComponents)): ?>
						<?php
						$assessmentComponents = json_decode($semester->assessmentComponents, true)
						?>
						<?php foreach ($assessmentComponents as $name => $points): ?>
							<div class="assesment-components-inputs">
								<input
									type="text"
									name="assesmentComponentName"
									value="<?= htmlspecialchars($name ?? '') ?>"
									oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
								<input
									type="number"
									name="assesmentComponentPoints"
									value="<?= htmlspecialchars($points ?? '') ?>"
									oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
								<button
									class="btn"
									onclick="removeAssesmentComponentInputs(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
									Видалити
								</button>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="assesment-components-inputs">
							<input
								type="text"
								name="assesmentComponentName"
								oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
							<input
								type="number"
								name="assesmentComponentPoints"
								oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
							<button
								class="btn"
								onclick="removeAssesmentComponentInputs(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
								Видалити
							</button>
						</div>
					<?php endif; ?>
					<button
						class="btn"
						id="addAssesmentComponent<?= htmlspecialchars($semester->semesterId) ?>"
						onclick="addAssesmentComponentsInputs(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($semester->taskTypeId) ?>)">
						Додати складову
					</button>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</form>