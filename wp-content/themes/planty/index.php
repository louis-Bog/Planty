<?php

	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<section class="main">
        <section class="bg-commander">
            <section class="section-global-width">
                <section class="votre-commande">
                    <h1>
                    <?php the_field('titre-h1-commander'); ?>
                    </h1>
                   
                </section>
                <section class="choix-commande">
                    <h2>
                    <?php the_field('titre-h2-votre-commande'); ?>
                    </h2>
                    <div class="commande-article-flex">
                        <div class="commande-article-colonne">

                       
                    <?php
                                $image_id = get_field('section-commander-img-fraise');
                                if ($image_id) {
                                    echo wp_get_attachment_image($image_id, 'full');
                                } ?>
                                <div class="compteur-fraise">
                                <?php
$compteur = get_field('compteur-fraise'); // Remplacez 'compteur' par le nom de votre champ ACF.

// Afficher le compteur avec des boutons "+" et "-":
?>
<div class="compteur">
    <div class="valeur">
    <input type="text" class="compteur-value" value="<?php echo esc_attr($compteur); ?>" name="compteur">
    </div>
    <div class="bouton">
    <button class="compteur-button" data-action="increment">+</button>
    <button class="compteur-button" data-action="decrement">-</button>
    </div>
    <button class="valider-button">Ok</button>
</div>


                                </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </section>
<?php
	endwhile; endif;
	get_footer();
?>