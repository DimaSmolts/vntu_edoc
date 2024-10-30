<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робочі програми</title>
    <link rel="stylesheet" href="component/styles/wpList.css">
</head>
<body>
    <main>
        <h2>Робочі програми</h2>
        <div id="list"></div>
        <button id="openModalBtn" class="create-new-wp">Створити нову робочу програму</button>
        
        <div id="educationalProgramNameModal" class="educational-program-name-modal">
        <div class="educational-program-name-modal-content">
            <span id="closeModal" class="close-modal">&times;</span>
            <h2>Назва навчальної дисципліни</h2>
            <form action="api/saveNewWP.php" method="POST">
                <label>Освітня програма:
                    <input type="text" id="educationalProgram" name="educationalProgram">
                </label>
            
                <button type="submit" class="create-new-wp">Перейти до заповнення</button>
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
            .then(data  => {
                if (data) {
                    const list = document.createElement("ol");
                    
                    const rows = data.message.map(row => {
                        const [id, title, createdAt] = row;
                        
                        const li = document.createElement("li");
                        
                        li.innerHTML = `
                            <div>
                                <b>${title}</b>
                                <span>.........</span>
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
            location.href= `details.php?id=${id}`;
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