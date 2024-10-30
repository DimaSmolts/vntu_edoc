<h2>Загальна інформація</h2>
<form>
	<label>Факультет:
	    <input type="text" id="facultyName" name="facultyName" oninput="saveInfo(event)">
	</label>
	<label>Кафедра:
	    <input type="text" id="departmentName" name="departmentName" oninput="saveInfo(event)">
	</label>
	<label>Дисципліна:
	    <input type="text" id="disciplineName" name="disciplineName" oninput="saveInfo(event)">
	</label>
	<label>Рівень вищої освіти:
	    <input type="text" id="degreeName" name="degreeName" oninput="saveInfo(event)">
	</label>
	<label>Галузь знань:
	    <input type="text" id="fielfOfStudyName" name="fielfOfStudyName" oninput="saveInfo(event)">
	</label>
	<label>Спеціальність:
	    <input type="text" id="specialtyName" name="specialtyName" oninput="saveInfo(event)">
	</label>
	<label>Освітня програма:
	    <input type="text" id="educationalProgram" name="educationalProgram" oninput="saveInfo(event)">
	</label>
	<div class="block-container">
	    <p>Документ затверджено:</p>
	    <div class="block">
	        <label>Посада:
	            <input placeholder="Посада" type="text" id="docApprovedByPosition" name="docApprovedByPosition" oninput="saveInfo(event)">
	        </label>
	        <label>Ім'я та прізвище:
	            <input placeholder="Іван Іванов" type="text" id="docApprovedByName"
	                name="docApprovedByName" oninput="saveInfo(event)">
	        </label>
	    </div>
	</div>
</form>