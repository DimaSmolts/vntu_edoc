<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робочі програми</title>
    <link rel="stylesheet" href="components/styles/index.css">
</head>
<body>
    <main>
        <h2>Робочі програми</h2>
        <ul>
            
        </ul>
        <button id="openModalBtn" class="create-new-wp">Створити нову робочу програму</button>
        
        <div id="educationalProgramNameModal" class="educational-program-name-modal">
        <div class="educational-program-name-modal-content">
            <span id="closeModal" class="close-modal">&times;</span>
            <h2>Назва навчальної дисципліни</h2>
            <form action="api/saveInfo.php" method="POST">
                <label>Освітня програма:
                    <input type="text" id="educationalProgram" name="educationalProgram" oninput="saveInfo(event)">
                </label>
            
                <button type="submit" class="create-new-wp">Перейти до заповнення</button>
            </form>
        </div>
    </div>
    </main>
    <script>
        var modal = document.getElementById("educationalProgramNameModal");
        var btn = document.getElementById("openModalBtn");
        var closeBtn = document.getElementById("closeModal");

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