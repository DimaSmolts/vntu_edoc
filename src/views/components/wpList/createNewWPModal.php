<div class="create-new-wp-btn-container">
	<button id="openModalBtn" class="btn" onclick="openCreateNewWPModal()">Створити нову робочу програму</button>
</div>

<div id="educationalProgramNameModal" class="educational-program-name-modal">
	<div class="educational-program-name-modal-content">
		<span id="closeModal" class="close-modal">&times;</span>
		<h2>Назва навчальної дисципліни</h2>
		<form class="wp-modal-container" action="saveNewWP" method="POST">
			<label class="wp-modal-label">Навчальна дисципліна:
				<input type="text" id="disciplineName" name="disciplineName" class="wp-modal-input">
			</label>

			<button type="submit" class="btn modal-create-new-wp">Перейти до заповнення</button>
		</form>
	</div>
</div>