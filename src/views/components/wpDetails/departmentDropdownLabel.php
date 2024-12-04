<label id="departmentDropdownLabel">Кафедра:
	<select
		name="departmentId"
		onchange="updateGeneralInfo(event, <?= htmlspecialchars($id) ?>)">
		<option></option>
		<?php foreach ($departments as $department): ?>
			<option value="<?= htmlspecialchars($department->id) ?>">
				<?= htmlspecialchars($department->name) ?>
			</option>
		<?php endforeach; ?>
	</select>
</label>