<?php $posts = list_post_by_type('startup'); ?>

<section class="section-wrapper" id="startups">
    <div class="section-content container section-startups">
        <?php if ($posts) : ?>
            <!-- Carrousel left arrow -->
            <button class="section-startups__left-carrousel">
                <img class="arrow-left" src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" />
            </button>

            <?php foreach ($posts as $post) : ?>
                <?php setup_postdata($post); ?>
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
                <?php wp_reset_postdata(); ?>
            <?php endforeach ?>

            <!-- Carrousel right arrow -->
            <button class="section-startups__right-carrousel">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" />
            </button>
        <?php else : ?>
            <p>No se encontraron publicaciones.</p>
        <?php endif; ?>
    </div>
</section>
