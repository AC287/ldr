	<!-- Template Name: Products Categories -->

<!-- // categories -->
<!-- // Page for main category. -->

<?php get_header(); ?>

<div class='prod-tocatalogs'>
	<a href='<?php echo home_url();?>/catalogs/'>Click here to view our catalogs.</a>
	<div class='prod-tocatalogs-underline'>
	</div>
</div>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			global $wp_query;
			global $wpdb;
			$cm0 = $wp_query->query_vars['m0'];
			$cs1 = $wp_query->query_vars['s1'];
			$cs2 = $wp_query->query_vars['s2'];
			$cs3 = $wp_query->query_vars['s3'];
			$cs4 = $wp_query->query_vars['s4'];
			$totalquery = 0;
			(!empty($cm0)?$totalquery++:$totalquery);
			(!empty($cs1)?$totalquery++:$totalquery);
			(!empty($cs2)?$totalquery++:$totalquery);
			(!empty($cs3)?$totalquery++:$totalquery);
			(!empty($cs4)?$totalquery++:$totalquery);

			echo "<div id='product-main-page'>";
			echo "<div class='cat-bar'>";	// This is accordion section.
				include 'phpsnippet/productaccordion.php';
			echo "</div>";		// This end accordion section.

			echo "<div class='prod-display'>";	// Start product section.

			// echo $totalquery;
			switch ($totalquery) {
				case 1:
					//only m0 is present in query. Displaying all s1 inside given m0 category.
					include 'phpsnippet/prod-m0.php';
				break;
				case 2:
					//s1 is present in query. Displaying all s2 inside given s1 category.
					include 'phpsnippet/prod-s1.php';
				break;
				case 3:
					echo "only m0, s1, and s2 are present";
				break;
				case 4:
					echo "only m0, s1, s2, and s3 are present";
				break;
				case 5:
					echo "every query are present.";
				break;
			}

			echo "</div>";	// end prod-display
			echo "</div>";	// end #product-main-page.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
