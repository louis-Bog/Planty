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
    <section class="content-avis">
        <h3> <?php the_field('titre-avis'); ?></h3>
        <section class="content-users-avis">
            <section class="user-avis">
            <?php
                $image_id = get_field('img-fatiha');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                    } ?>
                <div class="user-pseudo-texte">
                <h4>
                    <?php the_field('pseudo-fatiha'); ?>
                </h4>
                    <p>
                        <?php echo wp_kses_post(get_field('message-fatiha')); ?>
                    </p>
                
                </div>

            </section>
            <section class="user-avis">
            <?php
                $image_id = get_field('img-vero');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                    } ?>
                <div class="user-pseudo-texte">
                <h4>
                    <?php the_field('pseudo-vero'); ?>
                </h4>
                    <p>
                        <?php echo wp_kses_post(get_field('message-vero')); ?>
                    </p>
                
                </div>

            </section>
            <section class="user-avis">
            <?php
                $image_id = get_field('img-marc');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                    } ?>
                <div class="user-pseudo-texte">
                <h4>
                    <?php the_field('pseudo-marc'); ?>
                </h4>
                    <p>
                        <?php echo wp_kses_post(get_field('message-marc')); ?>
                    </p>
                
                </div>

            </section>
        </section>
    </section>
    <section class="img-canettes">
    <?php
                $image_id = get_field('img-canettes');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                    } ?>
    </section>
</section>
<?php get_footer(); ?>