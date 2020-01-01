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