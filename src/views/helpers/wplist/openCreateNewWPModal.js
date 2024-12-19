const openCreateNewWPModal = () => {
    const modal = document.getElementById("educationalProgramNameModal");
    modal.style.display = "flex";
};

document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModal");
    const modal = document.getElementById("educationalProgramNameModal");

    btn.onclick = openCreateNewWPModal;

    closeBtn.onclick = () => {
        modal.style.display = "none";
    };

    window.onclick = (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});