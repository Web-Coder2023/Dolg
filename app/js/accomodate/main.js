document.addEventListener('DOMContentLoaded', function () {
  const swiperElement = document.querySelector('.swiper');

  if (swiperElement) {
    function updateCounter(swiper) {
      const current = swiper.realIndex + 1;
      const total = swiper.slides.length;

      // Проверяем, существуют ли элементы счётчика
      const currentElement = document.querySelector('.swiper-counter .current');
      const totalElement = document.querySelector('.swiper-counter .total');

      if (currentElement) {
        currentElement.textContent = current.toString().padStart(2, '0');
      }
      if (totalElement) {
        totalElement.textContent = total.toString().padStart(2, '0');
      }
    }

    const swiper = new Swiper('.swiper', {
      direction: 'horizontal',
      scrollbar: {
        el: '.swiper-scrollbar',
      },
      navigation: {
        nextEl: '.swiper-button-next-custom',
        prevEl: '.swiper-button-prev-custom',
      },
      on: {
        init: updateCounter,
        slideChange: updateCounter,
      },
    });
  } else {
    console.log('Swiper element not found, initialization skipped');
  }
});


//= ../components/modal.js
//= ../components/burger.js

const items = document.querySelectorAll(".answered__accordion-item");

items.forEach(item => {
  const body = item.querySelector(".answered__accordion-body p");
  const button = item.querySelector("button");

  item.addEventListener("click", () => {
    const isActive = item.classList.contains("active");

    // Закрываем все (если нужно один открытый)
    items.forEach(i => {
      i.classList.remove("active");
      i.querySelector(".answered__accordion-body p").style.maxHeight = null;
      i.querySelector("button").classList.remove("open");
    });

    if (!isActive) {
      item.classList.add("active");
      body.style.maxHeight = body.scrollHeight + "px";
      button.classList.add("open");
    } else {
      item.classList.remove("active");
      body.style.maxHeight = null;
      button.classList.remove("open");
    }
  });
});