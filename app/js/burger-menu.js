// Бургер-меню
document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const body = document.body;

    // Проверяем наличие элементов
    if (!burgerMenu || !mobileMenu) {
        return;
    }

    // Открытие/закрытие меню по клику на бургер
    burgerMenu.addEventListener('click', function() {
        toggleMenu();
    });

    // Закрытие меню при клике на ссылку
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            closeMenu();
        });
    });

    // Закрытие меню при клике вне его области
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickOnBurger = burgerMenu.contains(event.target);
        
        if (!isClickInsideMenu && !isClickOnBurger && mobileMenu.classList.contains('active')) {
            closeMenu();
        }
    });

    // Закрытие меню при нажатии ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && mobileMenu.classList.contains('active')) {
            closeMenu();
        }
    });

    // Функция переключения меню
    function toggleMenu() {
        burgerMenu.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        body.classList.toggle('menu-open');
        
        // Управление прокруткой body
        if (mobileMenu.classList.contains('active')) {
            body.style.overflow = 'hidden';
        } else {
            body.style.overflow = '';
        }
    }

    // Функция закрытия меню
    function closeMenu() {
        burgerMenu.classList.remove('active');
        mobileMenu.classList.remove('active');
        body.classList.remove('menu-open');
        body.style.overflow = '';
    }

    // Закрытие меню при изменении размера окна (если переходим на десктоп)
    window.addEventListener('resize', function() {
        if (window.innerWidth > 900 && mobileMenu.classList.contains('active')) {
            closeMenu();
        }
    });
});
