<?php $posts = array_reverse(list_post_by_type('podcast')); ?>

<section class="section-wrapper" id="podcast">
    <div class="section-content container">
        <div class="section-content__info">
            <h3 class="section-content__info--title yellow-text">PODCAST</h3>
            <p class="section-content__info--text white-text">
                Una comunidad con los principales protagonistas del ecosistema emprendedor en América Latina.
            </p>
            <p class="section-content__info--text white-text">
            Realizamos Podcast a medida para que las empresas logren 
            posicionar su marca en las distintas plataformas digitales.
            </p>
            <p class="section-content__info--text white-text">
            Adaptamos cada capítulo a las necesidades de la marca, ofreciendo una amplia variedad de formatos.
            </p>
            <p class="section-content__info--text white-text">
            Endeavor, Newtopia, Emprende IAE, La Cocina de las marcas y 
            Café emprender son algunas de las empresas que confían en nosotros.
            </p>
        </div>
        <div class="another-content">
            <div class="podcasts-wrapper">
                <button>
                    <img class="arrow-left"
                    src="<?php echo get_template_directory_uri();?>/assets/icons/arrow-right.svg"
                    alt="postcast emprendar"/>
                </button>

                <!-- Podcast list -->
                <div class="podcasts">
                <?php foreach ($posts as $key=>$post) : ?>
                    <?php setup_postdata($post); ?>
                        <div class="podcast-content">
                            <h2 class="podcast-content__number">#<?php echo $key + 1?></h2>
                            <div class="podcast-content__footer">
                                <a href="<?php echo get_field('link_al_postcast');?>" target="_blank">
                                    <h3><?php echo get_the_title()?></h3>
                                </a>
                            </div>
                        </div>
                    <?php wp_reset_postdata(); ?>
                <?php endforeach ?>
                </div>

                <button>
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" alt="emprendar"/>
                </button>
            </div>
        </div>
    </div>
</section>
