document.addEventListener('DOMContentLoaded', function() {
  // Получаем все кнопки для открытия модальных окон
  const openButtons = document.querySelectorAll('[data-modal="open"]');
  // Получаем все кнопки для закрытия модальных окон
  const closeButtons = document.querySelectorAll('[data-modal="close"]');
  // Получаем body для добавления/удаления класса блокировки
  const body = document.body;

  // Функция для открытия модального окна
  function openModal(modalId) {
    const modal = document.querySelector(modalId);
    if (modal) {
      modal.classList.add('open');
      body.classList.add('_lock');
    }
  }

  // Функция для закрытия модального окна
  function closeModal(modalId) {
    const modal = document.querySelector(modalId);
    if (modal) {
      modal.classList.remove('open');
      body.classList.remove('_lock');
    }
  }

  // Обработчики для кнопок открытия
  openButtons.forEach(button => {
    button.addEventListener('click', function() {
      const modalId = this.getAttribute('data-target') || this.getAttribute('href');
      if (modalId) {
        openModal(modalId);
      }
    });
  });

  // Обработчики для кнопок закрытия
  closeButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Находим ближайшее родительское модальное окно
      const modal = this.closest('.modal');
      if (modal) {
        closeModal(`#${modal.id}`);
      }
    });
  });

  // Закрытие модального окна при клике вне его области
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
      closeModal(`#${e.target.id}`);
    }
  });

  // Закрытие модального окна при нажатии Esc
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      const openModal = document.querySelector('.modal.open');
      if (openModal) {
        closeModal(`#${openModal.id}`);
      }
    }
  });
});