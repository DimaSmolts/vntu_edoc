const openCreateNewWPModal = () => {
	const modal = document.getElementById("educationalProgramNameModal");
	const btn = document.getElementById("openModalBtn");

	const closeBtn = document.getElementById("closeModal");

	btn.onclick = () => {
		modal.style.display = "flex";
	}

	closeBtn.onclick = () => {
		modal.style.display = "none";
	}

	window.onclick = (event) => {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
}