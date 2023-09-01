<?php $posts = list_post_by_type('startup'); ?>

<section class="section-wrapper" id="startups">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php if ($posts) : ?>
                <?php foreach ($posts as $post) : ?>
                    <?php setup_postdata($post); ?>
                    <div class="swiper-slide">
                        <article class="section-content container section-startups">
                            <!-- Startup logo -->
                            <div class="section-startups__img-brand">
                                <?php
                                $image = get_field('imagen_video');
                                if (!empty($image)) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>

                            <!-- Startup info -->
                            <div class="section-content__info">
                                <h3 class="section-content__info--title"><?php echo get_the_title() ?></h3>
                                <?php echo get_field('descripcion'); ?>
                            </div>
                        </article>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endforeach ?>
            <?php endif; ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>