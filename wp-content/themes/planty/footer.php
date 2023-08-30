<footer class="site__footer">
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		<h5>
                    <?php the_field('mention-legales'); ?>
        </h5>
	</footer>
  
	<?php wp_footer(); ?>
</body>
</html>