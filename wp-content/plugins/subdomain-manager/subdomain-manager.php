<?php
/*
Plugin Name: Subdomain Manager
Plugin URI: http://www.thejakegroup.com/wordpress/
Description: Map subdomains to permalinks.
Version: 1.0
Author: Mark Wahl
Author URI: http://www.markandalexa.com
License: GPL2
*/

/*  Copyright 2012  Mark Wahl  (email : markwahl99@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* STEP 1: read the URL and see if there is a subdomain */

add_action('init','get_subdomain');
function get_subdomain()
{
	$URL = $_SERVER['HTTP_HOST'];
	$fulldomain = explode('.',$URL);
	$domaindepth = count($fulldomain);
	$siteurl = site_url();
	$siteurl = str_replace('http://','',$siteurl);
	$subdomain = $fulldomain[0];
	if ($domaindepth > 2 AND $fulldomain != $siteurl) {
		$args = 'pagename='.$subdomain;
		$the_query = query_posts( $args );
		if ( have_posts() ) {} else { 
			$args = 'name='.$subdomain;
			$the_query = query_posts( $args );
			if ( have_posts() ) {} else { wp_reset_query(); } 
		}
	}
	
/*	$subdomain = $fulldomain[0];
	echo"<p>subdomain: ".$subdomain;	
	$args = 'pagename='.$subdomain;
	echo "<br>args: ".$args;	
*/
	// Redefine main loop with new args based on subdomain. Needs to have a conditional on it to return to main query if there is no slug found.
	// $the_query = query_posts( $args );

	// Reset Query
	// wp_reset_query();

/* Previous  Stuff
	$the_query = new WP_Query( $args );
	// The Loop
	while ( $the_query->have_posts() ) : $the_query->the_post();
		echo '<li>permalink: ';
		//the_permalink();
		echo '</li>';
	endwhile;

	// Reset Post Data
	// wp_reset_postdata();
*/
}

/* STEP 2: put the subdomain into a variable */



/* STEP 3: query to see if there are any pages with a permalink that matches */

/* STEP 4: if there is a match, return the page */

/* THIS IS THE PLUGIN DATABASE INTIALIZATION */

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'manage_subdomain_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'manage_subdomain_remove' );

function manage_subdomain_install() {
/* Creates new database field */
add_option("manage_subdomain_data", 'Default', '', 'yes');
}

function manage_subdomain_remove() {
/* Deletes the database field */
delete_option('manage_subdomain_data');
}

/* THIS IS THE ADMIN COMPONENT */

// There is none.

?>