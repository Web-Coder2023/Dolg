<?php get_header(); ?>
<main class="main" role="main">
    <div style="max-width:900px;margin:80px auto;padding:0 20px;">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
