<?php 
    $posts = array_reverse(list_post_by_type('service'));
    $post_selected = $posts[0];
?>

<section class="section-wrapper" id="services">
    <div class="section-content container">
        <div class="section-content__info">
            <h3 class="section-content__info--title">
                <?php echo get_the_title($post_selected->ID);?>
                <span class="outline-black">
                    <?php echo get_field('sub_titulo', $post_selected->ID);?>
                </span>
            </h3>
            <p class="section-content__info--text">
                <?php echo get_field('texto_del_servicio', $post_selected->ID);?>
            </p>
        </div>
        <div class="another-content">
            <div class="services-partners-wrapper">
                <button>
                    <img class="arrow-left" src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" />
                </button>

                <div class="services-partners">
                    <!-- Partner left -->
                    <div class="services-partners__card card-side-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/dummy/academy-partner-a.png" />
                        <div class="services-partners__card--info">
                            <p class="services-partners__card--info-description">
                                JC Marketing
                            </p>
                            <p class="services-partners__card--info-title outline-yellow">
                                MARKETING
                            </p>
                            <button>¡Me interesa!</button>
                        </div>
                    </div>

                    <?php foreach ($posts as $key=>$post) : ?>
                        <?php setup_postdata($post); ?>
                        <!-- Partner center -->
                        <div class="services-partners__card card-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/dummy/academy-bubbletic.png" />
                            <div class="services-partners__card--info">
                                <p class="services-partners__card--info-description">
                                    <?php echo get_field('nombre_empresa', $post->ID);?>
                                </p>
                                <p class="services-partners__card--info-title outline-yellow">
                                    <?php echo get_field('servicio_que_ofrece', $post->ID);?>
                                </p>
                                <a href="<?php echo get_field('link_video', $post->ID);?>" target="_blank">
                                    <button>¡Me interesa!</button>
                                </a>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endforeach ?>

                    <!-- Partner right -->
                    <div class="services-partners__card card-side-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/dummy/academy-partner-b.png" />
                        <div class="services-partners__card--info">
                            <p class="services-partners__card--info-description">
                                Xeibo
                            </p>
                            <p class="services-partners__card--info-title outline-yellow">
                                FINANZAS
                            </p>
                            <button>¡Me interesa!</button>
                        </div>
                    </div>
                </div>
                <button>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" />
                </button>
            </div>
        </div>
    </div>
</section>