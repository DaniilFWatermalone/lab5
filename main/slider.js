let currentSlide = 1;

const images = ["main/img1.png", "main/img2.png", "main/img3.png", "main/img4.png"];
const texts = ["Text for slide 1", "Text for slide 2", "Text for slide 3", "Text for slide 4"];
const texts1 = ["Text for slide 1", "Text for slide 2", "Text for slide 3", "Text for slide 4"];

function showSlide() {
  const slideImg = document.getElementById('slideImg');
  const slideText = document.getElementById('slideText');
  const slideText1 = document.getElementById('slideText1');
  slideImg.src = images[currentSlide - 1];
  slideText.textContent = texts[currentSlide - 1];
  slideText1.textContent = texts1[currentSlide - 1];
    slideImg.style.opacity = 0;  
  setTimeout(() => {

    slideImg.style.opacity = 1; 

  }, 450); 
}

function prevSlide() {
  if (currentSlide > 1) {
    currentSlide--;
  } else {
    currentSlide = 4;
  }
  showSlide();
}

function nextSlide() {
  if (currentSlide < 4) {
    currentSlide++;
  } else {
    currentSlide = 1;
  }
  showSlide();
}

function cirkclick() {
  if (cirk = 1) {
    currentSlide = 1;
  } 
  showSlide();
}

function cirkclick1() {
  if (cirk = 2) {
    currentSlide = 2;
  } 
  showSlide();
}

function cirkclick2() {
  if (cirk = 3) {
    currentSlide = 3;
  } 
  showSlide();
}

function cirkclick3() {
  if (cirk = 4) {
    currentSlide = 4;
  } 
  showSlide();
}

showSlide();






















// let currentSlide = 1;

// const texts = ['????', '****', '№№№№№']; 

// function showSlide() {
//   const slideImg = document.getElementById('slideImg');
//   slideImg.src = `img${currentSlide}.png`;
// }

// function prevSlide() {
//   if (currentSlide > 1) {
//     currentSlide--;
    
//   } else {
//     currentSlide = 6;
//   }
//   showSlide();
// }

// function nextSlide() {
//   if (currentSlide < 6) {
//     currentSlide++;
    
//   } else {
//     currentSlide = 1;
//   }
//   showSlide();
// }

// showSlide(); 

