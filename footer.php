<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Light_Speed
 */

?>
<footer class="text-center bg-dark p-3 text-white">
	<p>
		Copyright &copy;
		<?php echo date(
			'Y'
		); ?>
		-
		<?php bloginfo(
			'name'
		); ?>
		- All Rights Reserved
	</p>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>