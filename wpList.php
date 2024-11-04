<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робочі програми</title>
    <link rel="stylesheet" href="component/styles/common.css">
    <link rel="stylesheet" href="component/styles/wpList.css">
</head>

<body>
    <main class="container">
        <div class="page-title-container">
            <h2 class="page-title">Робочі програми</h2>
        </div>

        <div id="list" class="wp-list-container"></div>
        <div class="create-new-wp-btn-container">
            <button id="openModalBtn" class="create-new-wp">Створити нову робочу програму</button>
        </div>

        <div id="educationalProgramNameModal" class="educational-program-name-modal">
            <div class="educational-program-name-modal-content">
                <span id="closeModal" class="close-modal">&times;</span>
                <h2>Назва навчальної дисципліни</h2>
                <form class="wp-modal-container" action="api/saveNewWP.php" method="POST">
                    <label class="wp-modal-label">Навчальна дисципліна:
                        <input type="text" id="disciplineName" name="disciplineName" class="wp-modal-input">
                    </label>

                    <button type="submit" class="modal-create-new-wp">Перейти до заповнення</button>
                </form>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('api/getWPListInfo.php', {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        const list = document.createElement("ol");
                        list.classList.add("wp-list");

                        const rows = data.message.map(row => {
                            const [id, title, createdAt] = row;

                            const li = document.createElement("li");
                            li.classList.add("wp-list-item")

                            li.innerHTML = `
							<div class="wp-list-item-content">
								<b>${title}</b>
								<span>${createdAt}</span>
								<button class="edit-wp" type="button" onclick="editWP(${id})">Відредагувати</button>
							</div>
                		`;


                            list.appendChild(li);
                        })

                        const listContainer = document.getElementById("list");
                        listContainer.appendChild(list);

                    } else {
                        console.error('No JSON response received');
                    }
                })
                .catch(error => console.error('Fetch error:', error));
        });

        const editWP = (id) => {
            location.href = `details.php?id=${id}`;
        }

        const modal = document.getElementById("educationalProgramNameModal");
        const btn = document.getElementById("openModalBtn");

        const closeBtn = document.getElementById("closeModal");

        btn.onclick = function() {
            modal.style.display = "flex";
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>