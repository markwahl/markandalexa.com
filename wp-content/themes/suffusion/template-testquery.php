<?php
/**
 * Template Name: Testquery
 *
 * Displays an HTML-based sitemap for your site.
 *
 * @package Suffusion
 * @subpackage Template
 */
?>

<?php 
$page_id = 221;
get_page( $page_id );
echo "hello";
?> 

<?php
/*
// The Query
$the_query = new WP_Query( 'page_id=221' );

// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();
	echo '<li>';
	the_title();
	echo '</li>';
endwhile;

// Reset Post Data
wp_reset_postdata();
*/
?>