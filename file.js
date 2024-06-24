// Отправка данных формы на сервер и обновление страницы
document.getElementById('add-object-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    fetch('add_object.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Уведомление пользователя об успешном добавлении
        // Здесь можно добавить код для обновления страницы или добавления элемента в DOM
    });
});
