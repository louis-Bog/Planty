<?php
/*
  Template Name: Commander
*/
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<section class="main"></section>
<?php
	endwhile; endif;
	get_footer();
?>