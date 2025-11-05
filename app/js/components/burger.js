document.addEventListener('DOMContentLoaded', function() {
  // Получаем все кнопки для открытия модальных окон
  const openButtons = document.querySelectorAll('[data-burger="open"]');
  // Получаем все кнопки для закрытия модальных окон
  const closeButtons = document.querySelectorAll('[data-burger="close"]');
  // Получаем body для добавления/удаления класса блокировки
  const body = document.body;

  // Функция для открытия модального окна
  function openModal(mobileNavId) {
    const mobileNav = document.querySelector(mobileNavId);
    if (mobileNav) {
      mobileNav.classList.add('open');
      body.classList.add('_lock');
    }
  }

  // Функция для закрытия модального окна
  function closeModal(mobileNavId) {
    const mobileNav = document.querySelector(mobileNavId);
    if (mobileNav) {
      mobileNav.classList.remove('open');
      body.classList.remove('_lock');
    }
  }

  // Обработчики для кнопок открытия
  openButtons.forEach(button => {
    button.addEventListener('click', function() {
      const mobileNavId = this.getAttribute('data-target') || this.getAttribute('href');
      if (mobileNavId) {
        openModal(mobileNavId);
      }
    });
  });

  // Обработчики для кнопок закрытия
  closeButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Находим ближайшее родительское модальное окно
      const mobileNav = this.closest('.mobileNav');
      if (mobileNav) {
        closeModal(`#${mobileNav.id}`);
      }
    });
  });

  // Закрытие модального окна при клике вне его области
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('mobileNav')) {
      closeModal(`#${e.target.id}`);
    }
  });

  // Закрытие модального окна при нажатии Esc
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      const openmobileNav = document.querySelector('.mobileNav.open');
      if (openmobileNav) {
        closeModal(`#${openmobileNav.id}`);
      }
    }
  });
});