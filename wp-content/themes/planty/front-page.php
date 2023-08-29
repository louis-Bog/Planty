<?php get_header(); ?>
<section class="main">
    <section class="content">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <section class="Section-energy-drink">
                    <h1>
                        <?php the_field('presentation'); ?>
                    </h1>

                    <?php
                    $image_id = get_field('img-drink');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                    } ?>
                </section>
            <?php endwhile;
        endif; ?>
        <section class="section-bas-drink">

        </section>
        <section class="infos">
            <h2>
                <?php the_field('infos-h2'); ?>
            </h2>

            <!– Avec le réglage nouveau paragraphe –>
                <p>
                    <?php echo wp_kses_post(get_field('infos-paragraphe')); ?>
                </p>

        </section>
        <section class="section-gouts">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>

                    <h3>
                        <?php the_field('les_gouts'); ?>
                    </h3>
                    <!– Avec le réglage nouveau paragraphe –>
                        <p>
                            <?php echo wp_kses_post(get_field('gouts-paragraphe')); ?>
                        </p>

                        <?php
                        ?>
                        <section class="article-fruits">
                            <div class="fraise titre-fruit">
                                <h3>
                                    <?php the_field('fraise'); ?>
                                </h3>
                                <?php
                                $image_id = get_field('img-fraise');
                                if ($image_id) {
                                    echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                            </div>
                            <?php
                            ?>
                            <div class="pamplemousse titre-fruit">
                                <h3>
                                    <?php the_field('pamplemousse'); ?>
                                </h3>
                                <?php
                                $image_id = get_field('img-pamplemousse');
                                if ($image_id) {
                                    echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                            </div>
                            <?php
                            ?>
                            <div class="framboise titre-fruit">
                                <h3>
                                    <?php the_field('framboise'); ?>
                                </h3>
                                <?php
                                $image_id = get_field('img-framboise');
                                if ($image_id) {
                                    echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                            </div>
                            <?php
                            ?>
                            <div class="citron titre-fruit">
                                <h3>
                                    <?php the_field('citron'); ?>
                                </h3>
                                <?php
                                $image_id = get_field('img-citron');
                                if ($image_id) {
                                    echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                            </div>
                            <button class="btn-commander">
                            <a  href="<?php the_field( 'commander' ); ?>">Commander</a></button>
                </section>
            <?php endwhile;
            endif; ?>
    </section>
</section>
<?php get_footer(); ?>