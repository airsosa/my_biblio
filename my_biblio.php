<?php
/*
Plugin Name: My Biblio
Plugin URI:  https://github.com/airsosa/my_biblio
Description: Creates custom post type to showcase my collection of boooks.
Version:     0.1
Author:      Eseosa Aigbogun
Author URI:  http://www.eseosaaigbogun.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
GitHub Plugin URI: https://github.com/airsosa/my_biblio
GitHub Branch:     master
*/

defined( 'ABSPATH' ) or die( ' ' );

add_action( 'init', 'create_library_post_type' );

function create_library_post_type() {

  $library_label = array(
    'name'                  => __('Library item'),
    'singular_name'         => __('Library item'),
    'all_items'             => __('All Library Items'),
    'add_new'               => _x('Add New Library Item', 'library item'),
    'add_new_item'          => __('Add New Library Item'),
    'edit_item'             => __('Edit Library Item'),
    'new_item'              => __('New Library Item'),
    'view_item'             => __('View Library Item'),
    'search_items'          => __('Search in Library Items'),
    'not_found'             => __('No Library Item found'),
    'not_found_in_trash'    => __('No Library Item found in trash'),
    'parent_item_colon'     => '',
  );
  $args = array(
    'labels'                => $library_label,
    'public'                => true,
    'rewrite'               => array('slug' => 'library'),
    'menu_postion'          => 5,
    'supports'              => array('title','editor', 'comments', 'thumbnail', 'excerpt'),
  );

  register_post_type('library', $args);

}


// Add custom taxonomies
add_action( 'init', 'library_create_taxonomies', 0 );
function library_create_taxonomies() {

  // Library item format
	$item_labels = array(
		'name' => _x( 'Format', 'taxonomy general name' ),
		'singular_name' => _x( 'Format', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in format' ),
		'all_items' => __( 'All formats' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit format' ),
		'update_item' => __( 'Update format' ),
		'add_new_item' => __( 'Add new format' ),
		'new_item_name' => __( 'New format' ),
		'menu_name' => __( 'Format' ),
	);
	register_taxonomy('type',array('library'),array(
		'hierarchical' => true,
		'labels' => $item_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'format' )
	));

// Library item Subject
$subject_labels = array(
  'name' => _x( 'Subject', 'taxonomy general name' ),
  'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search in subject' ),
  'all_items' => __( 'All subjects' ),
  'most_used_items' => null,
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Edit subject' ),
  'update_item' => __( 'Update subject' ),
  'add_new_item' => __( 'Add new subject' ),
  'new_item_name' => __( 'New subject' ),
  'menu_name' => __( 'Subject' ),
);
register_taxonomy('subject',array('library'),array(
  'hierarchical' => true,
  'labels' => $subject_labels,
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'subject' )
));

// Authors
		$authors_labels = array(
		'name' => _x( 'Author(s)', 'taxonomy general name' ),
		'singular_name' => _x( 'author', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in author' ),
		'popular_items' => __( 'Popular author' ),
		'all_items' => __( 'All authors' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit authors' ),
		'update_item' => __( 'Update author' ),
		'add_new_item' => __( 'Add new author' ),
		'new_item_name' => __( 'New author name' ),
		'separate_items_with_commas' => __( 'Separate authors with commas' ),
	    'add_or_remove_items' => __( 'Add or remove authors' ),
	    'choose_from_most_used' => __( 'Choose from the most used authors' ),
		'menu_name' => __( 'Authors' ),
	);
	register_taxonomy('authors',array('library'),array(
		'hierarchical' => false,
		'labels' => $authors_labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array('slug' => 'authors' )
	));

  // Publisher
  		$publisher_labels = array(
  		'name' => _x( 'Publisher', 'taxonomy general name' ),
  		'singular_name' => _x( 'publisher', 'taxonomy singular name' ),
  		'search_items' =>  __( 'Search in publisher' ),
  		'popular_items' => __( 'Popular publisher' ),
  		'all_items' => __( 'All publishers' ),
  		'most_used_items' => null,
  		'parent_item' => null,
  		'parent_item_colon' => null,
  		'edit_item' => __( 'Edit publisher' ),
  		'update_item' => __( 'Update publisher' ),
  		'add_new_item' => __( 'Add new publisher' ),
  		'new_item_name' => __( 'New publisher name' ),
  		'separate_items_with_commas' => __( 'Separate publisher with commas' ),
  	    'add_or_remove_items' => __( 'Add or remove publisher' ),
  	    'choose_from_most_used' => __( 'Choose from the most used publisher' ),
  		'menu_name' => __( 'Publishers' ),
  	);
  	register_taxonomy('publisher',array('library'),array(
  		'hierarchical' => false,
  		'labels' => $publisher_labels,
  		'show_ui' => true,
  		'update_count_callback' => '_update_post_term_count',
  		'query_var' => true,
  		'rewrite' => array('slug' => 'publisher' )
  	));


    // Year acquired
    		$acquired_labels = array(
    		'name' => _x( 'Year acquired', 'taxonomy general name' ),
    		'singular_name' => _x( 'Year acquired', 'taxonomy singular name' ),
    		'search_items' =>  __( 'Search in year acquired' ),
    		'popular_items' => __( 'Popular year acquired' ),
    		'all_items' => __( 'All years acquired' ),
    		'most_used_items' => null,
    		'parent_item' => null,
    		'parent_item_colon' => null,
    		'edit_item' => __( 'Edit year acquired' ),
    		'update_item' => __( 'Update year acquired' ),
    		'add_new_item' => __( 'Add new year acquired' ),
    		'new_item_name' => __( 'New year acquired' ),
    		'separate_items_with_commas' => __( 'Separate year acquired with commas' ),
    	    'add_or_remove_items' => __( 'Add or remove year acquired' ),
    	    'choose_from_most_used' => __( 'Choose from the most used year' ),
    		'menu_name' => __( 'Year acquired' ),
    	);
    	register_taxonomy('acquired',array('library'),array(
    		'hierarchical' => false,
    		'labels' => $acquired_labels,
    		'show_ui' => true,
    		'update_count_callback' => '_update_post_term_count',
    		'query_var' => true,
    		'rewrite' => array('slug' => 'acquired' )
    	));


}
