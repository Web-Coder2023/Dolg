<?php get_header(); ?>
<main class="main" role="main">
    <div style="max-width:900px;margin:80px auto;padding:0 20px;text-align:center;">
        <h1>404 — Страница не найдена</h1>
        <p>Запрашиваемая страница не существует.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="_btn">На главную</a>
    </div>
</main>
<?php get_footer(); ?>
