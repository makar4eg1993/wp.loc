<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    $basic_options_container = Container::make('theme_options', __('Theme Options'))
        ->add_fields(array(
            Field::make('header_scripts', 'crb_header_script', __('Header Script')),
            Field::make('footer_scripts', 'crb_footer_script', __('Footer Script')),
        ));

// Add second options page under 'Basic Options'
    Container::make('theme_options', __('Header settings'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_fields(array(
            Field::make('text', 'logo_link', __('Переход с логотипа')),
            Field::make('image', 'logo_img', __('Загрузить логотип'))->set_value_type('url'),
            Field::make('text', 'phone_number', __('Номер телефона')),
            Field::make('complex', 'work_time', __('Режим работы'))
                ->add_fields(array(
                    Field::make('text', 'work_day', __('День недели')),
                    Field::make('text', 'work_time', __('Время работы')),
                )),
            Field::make('text', 'button_name', __('Название кнопки')),
            Field::make('text', 'button_link', __('Ссылка перехода по нажатию кнопки'))


        ));
    Container::make('theme_options', __('Footer settings'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_fields(array(
            Field::make('text', 'crb_facebook_link', __('Facebook Link')),
            Field::make('text', 'crb_twitter_link', __('Twitter Link')),
        ));


}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}


add_action('wp_enqueue_scripts', 'add_theme_scripts');
function add_theme_scripts()
{
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/web/assets/mobirise-icons/mobirise-icons.css');
    wp_enqueue_style('styles-tether', get_template_directory_uri() . '/assets/tether/tether.min.css');
    wp_enqueue_style('styles-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('styles-bootstrap-reboot', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap-reboot.min.css');
    wp_enqueue_style('styles-socicon', get_template_directory_uri() . '/assets/socicon/css/styles.css');
    wp_enqueue_style('data-tables', get_template_directory_uri() . '/assets/data-tables/data-tables.bootstrap4.min.css');
    wp_enqueue_style('dropdown', get_template_directory_uri() . '/assets/dropdown/css/style.css');
    wp_enqueue_style('theme', get_template_directory_uri() . '/assets/theme/css/style.css');
    wp_enqueue_style('mobirise', get_template_directory_uri() . '/assets/mobirise/css/mbr-additional.css');

    wp_enqueue_script('min-jquery', get_template_directory_uri() . '/assets/js/jquery.js', [], null, 'in_footer');
    wp_enqueue_script('convesioner', get_template_directory_uri() . '/assets/js/convesioner.js', [], null, 'in_footer');

}

function register_main_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_main_menu');
function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link link text-white display-7"', $ulclass);
}

add_filter('wp_nav_menu', 'add_menuclass');