const openCreateNewWPModal = () => {
	const modal = document.getElementById("educationalProgramNameModal");
	const btn = document.getElementById("openModalBtn");

	const closeBtn = document.getElementById("closeModal");

	btn.onclick = function () {
		modal.style.display = "flex";
	}

	closeBtn.onclick = function () {
		modal.style.display = "none";
	}

	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
}