<?php
/* 
*triiger this file on plugin unistall
*/
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//clear database stored data

// $books = get_posts(array('post_type' => 'book', 'numberposts' => -1));

// foreach ($books as $book) {
//     wp_delete_post($book->ID, false);
// }

//access the database via sql
global $wpdb;
$wpdb->querry("DELETE FROM wp_posts WHERE post_type = 'book'");
$wpdb->querry("DELETE wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->querry("DELETE wp_term_relationship WHERE object_id NOT IN (SELECT id FROM wp_posts)");
