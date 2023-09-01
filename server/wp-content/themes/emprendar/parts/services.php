<?php
$posts = array_reverse(list_post_by_type('service'));
$post_selected = $posts[0];
?>

<section class="section-wrapper" id="services">
    <div class="section-content container">
        <div class="section-content__info">
            <h3 class="section-content__info--title">
                <span id="service_title"><?php echo get_the_title($post_selected->ID); ?></span>
                <span id="service_subtitle" class="outline-black">
                    <?php echo get_field('sub_titulo', $post_selected->ID); ?>
                </span>
            </h3>
            <div id="service_text" class="section-content__info--text">
                <?php echo get_field('texto_del_servicio', $post_selected->ID); ?>
            </div>
            <a href="#contact">
                <button class="btn-yellow">¡Me interesa!</button>
            </a>
        </div>
        <div class="another-content">
            <div class="swiper swiperServices">
                <div class="swiper-wrapper">
                    <?php foreach ($posts as $key => $post) : ?>
                        <?php setup_postdata($post); ?>
                        <!-- Partner center -->
                        <div class="services-partners__card swiper-slide"
                            data-title="<?php echo get_the_title();?>"
                            data-subtitle="<?php echo get_field('sub_titulo');?>"
                            data-service="<?php echo get_field('texto_del_servicio'); ?>"
                        >
                            <img src="<?php echo get_template_directory_uri();?>/assets/dummy/academy-bubbletic.png"
                                alt="<?php echo get_the_title();?>" />
                            <div class="services-partners__card--info">
                                <p class="services-partners__card--info-description">
                                    <?php echo get_field('nombre_empresa', $post->ID); ?>
                                </p>
                                <p class="services-partners__card--info-title outline-yellow">
                                    <a href="<?php echo get_field('link_video', $post->ID); ?>" target="_blank">
                                        <?php echo get_field('servicio_que_ofrece', $post->ID);?>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endforeach ?>
                </div>

                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>