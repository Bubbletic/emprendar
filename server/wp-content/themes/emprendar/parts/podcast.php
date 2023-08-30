<?php $posts = array_reverse(list_post_by_type('podcast')); ?>

<section class="section-wrapper" id="podcast">
    <div class="section-content container">
        <div class="section-content__info">
            <h3 class="section-content__info--title yellow-text">
                HEADING TITLE <span class="outline-yellow">PODCAST SECTION</span>
            </h3>
            <p class="section-content__info--text white-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. At veniam
                vel commodi cupiditate. Omnis magnam quo a ut labore voluptatibus
                eaque esse cum ad eveniet veritatis architecto dicta, atque odit.
            </p>
            <p class="section-content__info--text white-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. At veniam
                vel commodi cupiditate. Omnis magnam quo a ut labore voluptatibus
                eaque esse cum ad eveniet veritatis architecto dicta, atque odit.
            </p>
        </div>
        <div class="another-content">
            <div class="podcasts-wrapper">
                <button>
                    <img class="arrow-left" src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg"/>
                </button>

                <!-- Podcast list -->
                <div class="podcasts">
                <?php foreach ($posts as $key=>$post) : ?>
                    <?php setup_postdata($post); ?>
                        <div class="podcast-content">
                            <h2 class="podcast-content__number">#<?php echo $key + 1?></h2>
                            <div class="podcast-content__footer">
                                <h3><?php echo get_the_title()?></h3>
                            </div>
                        </div>
                    <?php wp_reset_postdata(); ?>
                <?php endforeach ?>
                </div>

                <button>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" />
                </button>
            </div>
        </div>
    </div>
</section>