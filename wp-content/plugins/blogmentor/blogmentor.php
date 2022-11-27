<?php
/**
 * Plugin Name: Blogmentor
 * Description: Showcase WordPress posts in beautiful ways with Elementor page builder.
 * Plugin URL: https://wordpress.org/plugins/blogmentor/
 * Version: 1.3
 * Author: AuburnForest
 * Author URI: https://auburnforest.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: blogmentor
 * Domain Path: /languages/
 */

/*
 * Exit if accessed directly
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Define Plugin URL and Directory Path
 */
define('BM_URL', plugins_url('/', __FILE__));  // Define Plugin URL
define('BM_PATH', plugin_dir_path(__FILE__));  // Define Plugin Directory Path
define('BM_DOMAIN', 'blogmentor');

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function bm_elementor_elments_load_plugin_textdomain() {
	load_plugin_textdomain( BM_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'bm_elementor_elments_load_plugin_textdomain' );

/**
 * Require files.
 *
 * Blogmentor Elementor Elements Register Elements ( Widgets).
 *
 * @since 1.0.0  
 */
if (!function_exists('bm_elements_widget_register')) {

    function bm_elements_widget_register() {
        require_once BM_PATH . 'includes/elements/blogmentor-blog-posts.php';
        require_once BM_PATH . 'includes/blogmentor-functions.php';
    }

}
add_action('elementor/widgets/widgets_registered', 'bm_elements_widget_register');

/**
 * Blogmentor Elementor Elements Register Categories.
 *
 * @since 1.0.0  
 */
function bm_elementor_elments_categories_registered( $elements_manager  ){

    $elements_manager->add_category(
        'blogmentor',
        [
            'title'  => __('Blogmentor', BM_DOMAIN),
            'icon' => 'fa fa-plug'
        ]
    );
}

add_action( 'elementor/elements/categories_registered', 'bm_elementor_elments_categories_registered' );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
if (!function_exists('bm_elements_widget_script_register')) {

    function bm_elements_widget_script_register() {
        wp_enqueue_style('fontawesome-style', BM_URL . 'assets/css/fontawesome-v5.2.0.css', false);
        
		wp_register_style('common-layout-style', BM_URL . 'assets/css/common-layout-style.css', false);
        wp_enqueue_style('common-layout-style');

        wp_register_style('grid-layout-style', BM_URL . 'assets/css/grid-layout-style.css', false);
        wp_enqueue_style('grid-layout-style');

        wp_register_style('masonry-layout-style', BM_URL . 'assets/css/masonry-layout-style.css', false);
        wp_enqueue_style('masonry-layout-style');
		
		wp_register_style('metro-layout-style', BM_URL . 'assets/css/metro-layout-style.css', false);
        wp_enqueue_style('metro-layout-style');
        
		wp_enqueue_script( 'masonry' );
		
		wp_register_script ( 'custom-script', BM_URL . 'assets/js/custom.js', array('jquery'), '', false );
		wp_enqueue_script ( 'custom-script' );
        
    }

}
add_action('wp_enqueue_scripts', 'bm_elements_widget_script_register');

/**
 * Check current version of Elementor
 */
if (!function_exists('bm_elements_plugin_load')) {

    function bm_elements_plugin_load() {
        
        // Load plugin textdomain
        load_plugin_textdomain('BM_DOMAIN', false, BM_PATH . '/languages');

        // Add image size for post card
        add_image_size('bm-post-thumb', 250, 250, true);
        add_image_size('bm-post-medium', 480, 250, true);
		
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', 'bm_elements_widget_fail_load');
            return;
        }
        $elementor_version_required = '1.1.2';
        if (!version_compare(ELEMENTOR_VERSION, $elementor_version_required, '>=')) {
            add_action('admin_notices', 'bm_elements_elementor_update_notice');
            return;
        }
    }

}
add_action('plugins_loaded', 'bm_elements_plugin_load');

/**
 * This notice will appear if Elementor is not installed or activated or both
 */
if (!function_exists('bm_elements_widget_fail_load')) {

    function bm_elements_widget_fail_load() {
        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }

        $plugin = 'elementor/elementor.php';

        if (bm_elements_elementor_installed()) {
            if (!current_user_can('activate_plugins')) {
                return;
            }
            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

            $message = '<p><strong>' . __('Blogmentor', BM_DOMAIN) . '</strong>' . __(' widgets not working because you need to activate the Elementor plugin.', BM_DOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', BM_DOMAIN)) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }

            $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

            $message = '<p><strong>' . __('Blogmentor', BM_DOMAIN) . '</strong>' . __(' widgets not working because you need to install the Elemenor plugin', BM_DOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', BM_DOMAIN)) . '</p>';
        }

        echo '<div class="error"><p>' . $message . '</p></div>';
    }

}

/**
 * Display admin notice for Elementor update if Elementor version is old
 */
if (!function_exists('bm_elements_elementor_update_notice')) {

    function bm_elements_elementor_update_notice() {
        if (!current_user_can('update_plugins')) {
            return;
        }

        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
        $message = '<p><strong>' . __('Blogmentor', BM_DOMAIN) . '</strong>' . __('widgets not working because you are using an old version of Elementor.', BM_DOMAIN) . '</p>';
        $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Elementor Now', BM_DOMAIN)) . '</p>';
        echo '<div class="error">' . $message . '</div>';
    }

}

/**
 * Action when plugin installed
 */
if (!function_exists('bm_elements_elementor_installed')) {

    function bm_elements_elementor_installed() {

        $file_path = 'elementor/elementor.php';
        $installed_plugins = get_plugins();

        return isset($installed_plugins[$file_path]);
    }

}

/**
 * Add reviews metadata on plugin activation
 */
if (!function_exists('bm_elements_plugin_activation')) {

    function bm_elements_plugin_activation() {
        $notices = get_option('blogmentor_reviews', array());
		
        $notices[] = '<p>Hi, you are now using <strong>Blogmentor</strong> plugin. I would really appreciate it if you could give me the five star to our plugin. </p><p><a href="https://wordpress.org/support/plugin/blogmentor/reviews/?filter=5#new-post" target="_blank" class="rating-link"><strong> Okay, you deserve it </strong></a></p>';
        update_option('blogmentor_reviews', $notices);
    }

}
register_activation_hook(__FILE__, 'bm_elements_plugin_activation');

/**
 * Display admin notice on Blogmentor activation for ratings
 */
if (!function_exists('bm_elements_reviews_notices')) {

    function bm_elements_reviews_notices() {
        if ($notices = get_option('blogmentor_reviews')) {
            foreach ($notices as $notice) {
                echo "<div class='notice notice-success is-dismissible'><p>$notice</p></div>";
            }
            delete_option('blogmentor_reviews');
        }
    }

    add_action('admin_notices', 'bm_elements_reviews_notices');
}

/**
 * Remove reviews metadata on plugin deactivation.
 */
if (!function_exists('bm_elements_plugin_deactivation')) {

    function bm_elements_plugin_deactivation() {
        delete_option('blogmentor_reviews');
    }

}
register_deactivation_hook(__FILE__, 'bm_elements_plugin_deactivation');
