<div class="page-title-container">
	<h2 class="page-title">Загальна інформація</h2>
</div>
<form class="wp-form">
	<label>Факультет:
		<input type="text" id="facultyName" name="facultyName" oninput="updateGeneralInfo(event)">
	</label>
	<label>Кафедра:
		<input type="text" id="departmentName" name="departmentName" oninput="updateGeneralInfo(event)">
	</label>
	<label>Дисципліна:
		<input type="text" id="disciplineName" name="disciplineName" oninput="updateGeneralInfo(event)">
	</label>
	<label>Рівень вищої освіти:
		<input type="text" id="degreeName" name="degreeName" oninput="updateGeneralInfo(event)">
	</label>
	<label>Галузь знань:
		<input type="text" id="fielfOfStudyName" name="fielfOfStudyName" oninput="updateGeneralInfo(event)">
	</label>
	<label>Спеціальність:
		<input type="text" id="specialtyName" name="specialtyName" oninput="updateGeneralInfo(event)">
	</label>
	<label>Освітня програма:
		<input type="text" id="educationalProgram" name="educationalProgram" oninput="updateGeneralInfo(event)">
	</label>
	<div class="mini-block">
		<p class="mini-block-title">Документ затверджено:</p>
		<label>Посада:
			<input placeholder="Посада" type="text" id="docApprovedByPosition" name="docApprovedByPosition" oninput="updateGeneralInfo(event)">
		</label>
		<label>Ім'я та прізвище:
			<input placeholder="Іван Іванов" type="text" id="docApprovedByName"
				name="docApprovedByName" oninput="updateGeneralInfo(event)">
		</label>
	</div>
</form>