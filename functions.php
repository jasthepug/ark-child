<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

add_action('cmb2_admin_init', 'stores_ad_group');
add_action('cmb2_admin_init', 'online_store_ad_group');
add_action('cmb2_admin_init', 'trademark_text');
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function stores_ad_group()
{
    $prefix = 'stores_ad_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Stores', 'cmb2'),
        'object_types' => array('page'),
    ));

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field(array(
        'id' => $prefix . 'demo',
        'type' => 'group',
        'description' => esc_html__('Entries for stores', 'cmb2'),
        'options' => array(
            'group_title' => esc_html__('Entry {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button' => esc_html__('Add Another Entry', 'cmb2'),
            'remove_button' => esc_html__('Remove Entry', 'cmb2'),
            'sortable' => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ));

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Entry Title', 'cmb2'),
        'id' => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ));

    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Entry Image', 'cmb2'),
        'id' => 'image',
        'type' => 'file',
    ));
}

function online_store_ad_group() {
    $prefix = 'online_stores_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Online Store Links', 'cmb2' ),
        'object_types' => array( 'page' ),
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'demo',
        'type'        => 'group',
        'description' => esc_html__( 'Entries for online stores', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    $cmb_group->add_group_field($group_field_id, array(
        'name' => __( 'Website URL', 'cmb2' ),
        'id'   => 'online_store_url',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Entry Title', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => esc_html__( 'Entry Image', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
    ) );

}

function trademark_text() {

    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'page' ), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ) );

    $cmb->add_field( array(
        'name'    => 'Trademark text',
        'desc'    => 'Trademark text here',
        'default' => 'standard value (optional)',
        'id'      => 'trademark_text',
        'type'    => 'text',
    ) );
}

add_action('wp_enqueue_scripts', 'ark_register_styles');
/**
 * Enqueues styles.
 */

function ark_register_styles()
{

    // Bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap.min.css', array(), '3.3.6');

    // Theme javascript plugins
    wp_enqueue_style('jquery.mCustomScrollbar', get_template_directory_uri() . '/assets/plugins/scrollbar/jquery.mCustomScrollbar.css', array(), '3.1.12');
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/assets/owl.carousel.css', array(), '1.3.2');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '3.5.1');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/plugins/magnific-popup/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_style('cubeportfolio', get_template_directory_uri() . '/assets/plugins/cubeportfolio/css/cubeportfolio.min.css', array(), '3.8.0');

    // Icon Fonts
    if (class_exists('ffContainer')) {
        ark_wp_enqueue_framework_icon_fonts_styles();
    } else {
        wp_enqueue_style('ark-modified-font-awesome', get_template_directory_uri() . '/no-ff/iconfonts/ff-font-awesome4/ff-font-awesome4.css');
        wp_enqueue_style('ark-modified-font-et-line', get_template_directory_uri() . '/no-ff/iconfonts/ff-font-et-line/ff-font-et-line.css');
    }

    // Theme Styles
    wp_enqueue_style('ark-one-page-business', get_template_directory_uri() . '/assets/css/one-page-business.css');
    wp_enqueue_style('ark-landing', get_template_directory_uri() . '/assets/css/landing.css');

    // Stylesheet from the PARENT theme
    wp_enqueue_style('ark-style', get_template_directory_uri() . '/style.css');

    // Stylesheet from the CHILD theme
    wp_enqueue_style('ark-style-child', get_stylesheet_directory_uri() . '/style.css');

    if (class_exists('ffContainer')) {
        ark_wp_enqueue_theme_google_fonts_styles();
    } else {
        wp_enqueue_style('ark-fonts', ark_fonts_url(), array(), null);
        wp_enqueue_style('ark-fonts-family', get_template_directory_uri() . '/no-ff/no-ff-fonts.css');
    }

    if (class_exists('WooCommerce')) {
        wp_enqueue_style('ark-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.css');
    }
    $url = ark_get_custom_color_css_url();
    wp_enqueue_style('ark-colors', $url);

    // TwentyTwenty
    wp_enqueue_style('twentytwenty', get_template_directory_uri() . '/assets/plugins/twentytwenty/css/twentytwenty.css', array());
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles');

function child_enqueue_styles()
{
    wp_enqueue_style('ad-style', get_template_directory_uri() . '/dist/ad.css', array());
}
