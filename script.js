window.onload=function(){
// Открытие формы авторизации
document.getElementById('login-btn').addEventListener('click', function () {
    document.getElementById('login-popup').style.display = 'inline-grid';
    const element = document.getElementById('animatedElement');
    element.classList.add('popup');
   });
}

document.getElementById('popup-vhod').addEventListener('click', function () {
    document.getElementById('login-popup').style.display = 'inline-grid';
    document.getElementById('reg-popup').style.display = 'none';
    const element = document.getElementById('animatedElement');
    element.classList.add('popup');
   });
   // Закрытие формы авторизации
   document.getElementById('popup-close').addEventListener('click', function () {
    document.getElementById('login-popup').style.display = 'none';
    const element = document.getElementById('animatedElement');
    element.classList.add('popup');
    });
   

       // Открытие формы регистрации
   document.getElementById('popup-reg').addEventListener('click', function () {
    document.getElementById('reg-popup').style.display = 'block';
    document.getElementById('login-popup').style.display = 'none';
    const element = document.getElementById('animatedElement');
    element.classList.add('popup');
   });
   
   // Закрытие формы регистрации
   document.getElementById('popup-close-1').addEventListener('click', function () {
    document.getElementById('reg-popup').style.display = 'none';
    const element = document.getElementById('animatedElement');
    element.classList.add('popup');
    });

    

           // Открытие бургерменю
   document.getElementById('Burger-btn').addEventListener('click', function () {
    document.getElementById('burger-menu').style.display = 'inline-grid';
   });
   
   // Закрытие бургерменю
   document.getElementById('burger-close').addEventListener('click', function () {
    document.getElementById('burger-menu').style.display = 'none';
   });