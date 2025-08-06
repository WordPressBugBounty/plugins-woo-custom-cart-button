<?php
/**
 * Elementor Widgets for WooCommerce Custom Cart Button
 * 
 * @package WooCommerce Custom Cart Button
 * @since 2.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Main Elementor Widgets Class
 */
final class CATCBLL_Elementor_Widgets {

    /**
     * Plugin Version
     *
     * @var string The plugin version.
     */
    const VERSION = '2.0';

    /**
     * Minimum Elementor Version
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    /**
     * Minimum PHP Version
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.4';

    /**
     * Instance
     *
     * @access private
     * @static
     * @var CATCBLL_Elementor_Widgets The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @access public
     * @static
     * @return CATCBLL_Elementor_Widgets An instance of the class.
     */
    public static function instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct() {

        add_action('plugins_loaded', [$this, 'init']);

    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @access public
     */
    public function init() {

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

        // Check if WooCommerce is active
        if (!class_exists('WooCommerce')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_woocommerce']);
            return;
        }

        // Add Plugin actions
        add_action('elementor/widgets/register', [$this, 'init_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'add_widget_categories']);

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin() {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'catcbll'),
            '<strong>' . esc_html__('WooCommerce Custom Cart Button - Elementor Widgets', 'catcbll') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'catcbll') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'catcbll'),
            '<strong>' . esc_html__('WooCommerce Custom Cart Button - Elementor Widgets', 'catcbll') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'catcbll') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @access public
     */
    public function admin_notice_minimum_php_version() {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'catcbll'),
            '<strong>' . esc_html__('WooCommerce Custom Cart Button - Elementor Widgets', 'catcbll') . '</strong>',
            '<strong>' . esc_html__('PHP', 'catcbll') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    /**
     * Admin notice
     *
     * Warning when WooCommerce is not installed or activated.
     *
     * @access public
     */
    public function admin_notice_missing_woocommerce() {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: WooCommerce */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'catcbll'),
            '<strong>' . esc_html__('WooCommerce Custom Cart Button - Elementor Widgets', 'catcbll') . '</strong>',
            '<strong>' . esc_html__('WooCommerce', 'catcbll') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @access public
     */
    public function init_widgets() {

        // Include Widget files
        require_once(__DIR__ . '/widgets/class-catcbll-product-button-widget.php');

        // Register Widgets
        \Elementor\Plugin::instance()->widgets_manager->register(new \CATCBLL_Product_Button_Widget());

    }

    /**
     * Add Widget Categories
     *
     * Add custom widget categories for the plugin
     *
     * @access public
     */
    public function add_widget_categories($elements_manager) {

        $elements_manager->add_category(
            'catcbll-widgets',
            [
                'title' => esc_html__('Custom Cart Button', 'catcbll'),
                'icon' => 'fa fa-shopping-cart',
            ]
        );

    }

}

// Initialize the plugin
CATCBLL_Elementor_Widgets::instance(); 