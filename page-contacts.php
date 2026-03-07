<?php
/**
 * Template Name: Контакты
 * Template Post Type: page
 */
?>
<?php get_header(); ?>
<main class="main" role="main">
<section class="contacts-callback callback _section-padding"><div class="callback__container"><h1 class="_section-title contacts-callback__title">Контакты</h1><div class="contacts-callback__wrap df df-jb"><div class="callback__left df df-fc df-jb"><h4 class="_section-title">Оставьте заявку —<br>перезвоним <span>через 15 минут</span></h4><div class="callback__wrap"><p>Адрес:</p><p>664007, г. Иркутск, ул. Поленова, д.1/1, оф.213</p><p>Телефоны:</p><p><a href="tel:83952716094">8 (395) 271-60-94</a> (многоканальный)</p><p>Почта:</p><p><a href="mailto:irk660314@yandex.ru">irk660314@yandex.ru</a></p><p>Напишите нам и мы обязательно Вам поможем!</p></div></div><div class="callback__right"><form action="#" method="POST" id="callbackForm" class="form df df-fc df-as"><input type="text" name="name" class="_input" placeholder="Ваше имя" required> <input type="tel" name="phone" class="_input" placeholder="Телефон" required> <input type="email" name="email" class="_input" placeholder="Почта" required> <textarea name="message" class="_textarea" placeholder="Сообщение..."></textarea> <button type="submit" class="_btn">Записаться <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.355469 0.353516L9.35547 9.35352M9.35547 9.35352V0.712211M9.35547 9.35352H0.355469" stroke="white"/></svg></button></form><div class="callback__wrap"><div class="callback__agreement"><input type="checkbox" name="agreement" id="agreement" required> <label for="agreement">Я соглашаюсь на <a href="#" target="_blank">обработку персональных данных</a> <span>*</span></label></div><!-- reCAPTCHA в левом блоке --><div class="callback__recaptcha"><p class="callback__recaptcha-label">Я не робот</p><div class="captcha-box"><div class="g-recaptcha" id="callbackRecaptcha" data-sitekey="6LdvDgYsAAAAAB6F6znOVZLfVhZUJcAQhkwGqNjA"></div></div></div></div></div></div></div></section>
</main>
<?php get_footer(); ?>
