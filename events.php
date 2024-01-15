<?php
// Register Custom Post Type
function custom_post_type_events() {
    register_post_type('events',
        array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Event'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}
add_action('init', 'custom_post_type_events');

// Register Custom Taxonomy
function custom_taxonomy_event_category() {
    register_taxonomy(
        'event_category',
        'events',
        array(
            'label' => __('Event Categories'),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );
}
add_action('init', 'custom_taxonomy_event_category');

// Shortcode to Display Events
function events_shortcode() {
    $args = array(
        'post_type' => 'events',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="events-container">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="single-event">';
            echo '<h2 class="event-title">' . get_the_title() . '</h2>';
            echo '<div class="event-details">' . get_the_content() . '</div>';
            
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo 'No events found.';
    }
}
add_shortcode('display_events', 'events_shortcode');



