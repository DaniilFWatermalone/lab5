// document.getElementById('login-popup').addEventListener('submit', function(e) {
//     e.preventDefault();

//     var formData = new FormData(this);

//     fetch('login.php', {
//         method: 'post',
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.status === 'success') {
//             // Закрыть всплывающее окно и обновить интерфейс
//             Close();
//             alert('Добро пожаловать, ' + data.username);
//         } else {
//             alert(data.message);
//         }
//     })
//     .catch(error => {
//         console.error('Ошибка:', error);
//     });
// });
