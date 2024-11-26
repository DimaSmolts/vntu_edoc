const openApproveDeletingModal = (titleName, eventHandler, checkbox = null) => {
	const modal = document.getElementById("deletingModal");

	modal.style.display = "flex";

	const deletingModalTitle = document.getElementById("deletingModalTitle");
	deletingModalTitle.innerText = `Видалити ${titleName}?`;

	const deletingModalDesc = document.getElementById("deletingModalDesc");
	deletingModalDesc.innerText = `Всі пов'язані дані також буде видалено`;

	const cancelDeletingBtn = document.getElementById("cancelDeletingBtn");
	cancelDeletingBtn.onclick = function () {
		modal.style.display = "none";
		if (checkbox) {
			checkbox.checked = true;
		}
	}

	const closeModal = document.getElementById("closeModal");
	closeModal.onclick = function () {
		modal.style.display = "none";
		if (checkbox) {
			checkbox.checked = true;
		}
	}

	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
			if (checkbox) {
				checkbox.checked = true;
			}
		}
	}

	const approveDeletingBtn = document.getElementById("approveDeletingBtn");

	approveDeletingBtn.onclick = () => {
		eventHandler();
		modal.style.display = "none";
	};
}