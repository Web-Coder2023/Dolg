<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function dolg_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    register_nav_menus( array(
        'primary' => __( 'Основное меню', 'dolg' ),
    ) );
}
add_action( 'after_setup_theme', 'dolg_theme_setup' );

function dolg_enqueue_assets() {
    $ver = '1.0.0';

    wp_enqueue_style(
        'dolg-main-style',
        get_template_directory_uri() . '/assets/css/style.min.css',
        array(),
        $ver
    );

    if ( is_front_page() ) {
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css',
            array(),
            '12'
        );
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
            array(),
            '12',
            true
        );
    }

    wp_enqueue_script(
        'google-recaptcha',
        'https://www.google.com/recaptcha/api.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'dolg-main-js',
        get_template_directory_uri() . '/assets/js/main.min.js',
        array(),
        $ver,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'dolg_enqueue_assets' );

function dolg_theme_uri( $path = '' ) {
    return get_template_directory_uri() . ( $path ? '/' . ltrim( $path, '/' ) : '' );
}

require_once get_template_directory() . '/inc/acf-fields.php';
