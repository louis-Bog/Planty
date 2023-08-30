<?php
/*
  Template Name: Nous rencontrer
*/
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<section class="main">

        <section class="nous-rencontrer">
            <?php
                $image_id = get_field('img-fleur');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                } ?>
            <div class="rencontrer-titre-text">
                <h1>
                    <?php the_field('titre-nous_rencontrer'); ?>
                </h1>
                <p>
                    <?php echo wp_kses_post(get_field('text-nous-rencontrer')); ?>
                </p>
            </div>
        </section>
        <section class="equipe">
            <h2>
                <?php the_field('equipe-titre'); ?>
            </h2>
            <section class="user-equipe">
                <section class="profil-user-equipe">
                <?php
                $image_id = get_field('img-ceo');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                                 <h3 class="reglage">
                    <?php the_field('ceo-pseudo'); ?>
                </h3>
                <p>
                    <?php echo wp_kses_post(get_field('ceo-activite')); ?>
                </p>
                </section>
           
           
                <section class="profil-user-equipe">
                <?php
                $image_id = get_field('img-nutritionniste');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                                 <h3>
                    <?php the_field('nutritionniste-pseudo'); ?>
                </h3>
                <p>
                    <?php echo wp_kses_post(get_field('nutritionniste-activite')); ?>
                </p>
                </section>
          
       
                <section class="profil-user-equipe">
                <?php
                $image_id = get_field('img-mixologue');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                                 <h3>
                    <?php the_field('mixologue-pseudo'); ?>
                </h3>
                <p>
                    <?php echo wp_kses_post(get_field('mixologue-activite')); ?>
                </p>
                </section>
                <div class="img-branche">
                 <?php
                $image_id = get_field('img-branche');
                    if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                </div>
            </section>
           
        </section>
        <section class="nous-contacter">
            <h2>
                <?php the_field('titre-nous-contacter'); ?>
            </h2>
        </section>

    </section>
<?php
	endwhile; endif;
	get_footer();
?>