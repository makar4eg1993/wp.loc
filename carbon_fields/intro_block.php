<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

function intro_block_gen()
{
    Block::make(__('Intro block'))
        ->add_fields(array(
            Field::make('text', 'title', __('Заголовок')),
            Field::make('text', 'description_title', __('Заголовок описание')),
            Field::make('text', 'title_article', __('Название специализации')),
            Field::make('rich_text', 'content', __('Описание специализации')),
            Field::make('image', 'image', __('Block Image'))->set_value_type('url'),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            ?>


            <section class="features11 cid-qv8gC4Ql60" id="features11-8" data-rv-view="1284">


                <div class="container">
                    <div class="col-md-12">
                        <div class="media-container-row">
                            <div class="mbr-figure" style="width: 50%;">
                                <img src="assets/images/1-1064x1594.jpg" alt="Мята" title="" media-simple="true">
                            </div>
                            <div class=" align-left">
                                <h2 class="mbr-title pt-2 mbr-fonts-style display-2"><?= $fields['title'];?></h2>
                                <div class="mbr-section-text">
                                    <p class="mbr-text mb-5 pt-3 mbr-light mbr-fonts-style display-5">
                                        Ведущее направление медицинского центра «Мята» — акушерство и гинекология.
                                    </p>
                                </div>

                                <div class="block-content">
                                    <div class="card p-3 pr-3">


                                        <div class="card-box">
                                            <h4 class="card-title mbr-fonts-style display-7">АКУШЕРСТВО И
                                                ГИНЕКОЛОГИЯ</h4>
                                            <?= $fields['content'];?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        });
}

add_action('carbon_fields_register_fields', 'intro_block_gen');



