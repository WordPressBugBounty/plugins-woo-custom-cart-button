<?php

/**
 * Product Custom Button Widget for Elementor
 * 
 * @package WooCommerce Custom Cart Button
 * @since 2.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Product Custom Button Widget Class
 */
class CATCBLL_Product_Button_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'catcbll_product_custom_button';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Custom Buttons', 'catcbll');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-button';
    }

    /**
     * Get widget categories.
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['catcbll-widgets'];
    }

    /**
     * Get widget keywords.
     *
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['product', 'custom', 'button', 'cart', 'woocommerce'];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls()
    {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Product Settings', 'catcbll'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_product_info',
            [
                'label' => esc_html__('Show Product Info', 'catcbll'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'catcbll'),
                'label_off' => esc_html__('No', 'catcbll'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'show_product_image',
            [
                'label' => esc_html__('Show Product Image', 'catcbll'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'catcbll'),
                'label_off' => esc_html__('No', 'catcbll'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'show_product_info' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_product_title',
            [
                'label' => esc_html__('Show Product Title', 'catcbll'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'catcbll'),
                'label_off' => esc_html__('No', 'catcbll'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_product_info' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_product_price',
            [
                'label' => esc_html__('Show Product Price', 'catcbll'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'catcbll'),
                'label_off' => esc_html__('No', 'catcbll'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'show_product_info' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();



        // Info: Plugin Styling Notice
        $this->start_controls_section(
            'info_section',
            [
                'label' => esc_html__('Information', 'catcbll'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'styling_notice',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<div style="background-color: #f0f8ff; padding: 15px; border-left: 4px solid #0073aa; margin: 10px 0;">
                    <strong>' . esc_html__('Styling Information:', 'catcbll') . '</strong><br>
                    ' . esc_html__('Button styling is controlled by the plugin settings page. Go to Custom Add to Cart → Button Settings to customize colors, fonts, borders, and other styling options.', 'catcbll') . '
                </div>',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Dynamically get the current product ID
        $product_id = $this->get_current_product_id();

        if (!$product_id) {
            echo '<div class="catcbll-error">' . esc_html__('No product found on this page. This widget works on product pages.', 'catcbll') . '</div>';
            return;
        }

        $product = wc_get_product($product_id);
        if (!$product) {
            echo '<div class="catcbll-error">' . esc_html__('Product not found', 'catcbll') . '</div>';
            return;
        }

        // Set global product variable for the settings file
        global $product;
        $product = wc_get_product($product_id);
        // Include the plugin settings file to get all variables
        $settings_file_path = WCATCBLL_CART_PUBLIC . 'wcatcbll_all_settings.php';
        if (file_exists($settings_file_path)) {
            include_once $settings_file_path;
        } else {
            // Fallback to manual settings if file doesn't exist
            $catcbll_settings = get_option('_woo_catcbll_all_settings', array());
        }


        // Build CSS classes
        $position_class = !empty($catcbll_custom_btn_position) ? 'catcbll-position-' . $catcbll_custom_btn_position : '';
        $alignment_class = !empty($catcbll_custom_btn_alignment) ? 'catcbll-alignment-' . $catcbll_custom_btn_alignment : '';
        $widget_class = 'catcbll-product-widget';

        // Apply plugin styling using variables from included file
        $this->apply_plugin_styling_from_variables();

?>
        <div class="<?php echo esc_attr($widget_class); ?>">

            <?php if ($settings['show_product_info'] === 'yes'): ?>
                <div class="catcbll-product-info">

                    <?php if ($settings['show_product_image'] === 'yes'): ?>
                        <div class="catcbll-product-image">
                            <?php echo $product->get_image('medium'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($settings['show_product_title'] === 'yes'): ?>
                        <h3 class="catcbll-product-title">
                            <a href="<?php echo esc_url($product->get_permalink()); ?>">
                                <?php echo esc_html($product->get_name()); ?>
                            </a>
                        </h3>
                    <?php endif; ?>

                    <?php if ($settings['show_product_price'] === 'yes'): ?>
                        <div class="catcbll-product-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <div class="catcbll-product-buttons <?php echo esc_attr($position_class . ' ' . $alignment_class); ?>">
                <?php
                // Check if buttons should be displayed based on global, shop, and single settings
                $should_display_buttons = false;

                if (is_single()) {
                    // For single product pages: check if both global and single settings are enabled
                    $should_display_buttons = ($global == 'global' || $single == 'single-product');
                } else {
                    // For shop/archive pages: check if both global and shop settings are enabled
                    $should_display_buttons = ($global == 'global' && $shop == 'shop');
                }

                // Only show buttons if display conditions are met
                if ($should_display_buttons) {
                    // Show buttons according to plugin logic (like archive.php)

                    if (is_single()) {

                        // if custom setting is on
                        if (!empty($prd_lbl[0]) && ($custom == "custom")) {
                            if ($both == "both" && $add2cart == "add2cart" && ($catcbll_custom_btn_position == 'down' || $catcbll_custom_btn_position == 'right')) {
                                // For both variable and simple products, use the main template which handles variations automatically
                                woocommerce_template_single_add_to_cart();
                            }

                            // Show multiple buttons using loop
                            for ($y = 0; $y < $atxtcnt; $y++) {
                                if (!empty($prd_url[$y])) {
                                    $aurl = esc_url($prd_url[$y]);
                                } else {
                                    $aurl = esc_url(site_url() . '/?add-to-cart=' . $pid);
                                }
                                $prd_btn = '';
                                if ($catcbll_btn_icon_psn == 'right') {
                                    if (!empty($prd_lbl[$y])) {
                                        $prd_btn = '<div class="catcbll_preview_button"><a href="' . $aurl . '" class="' . esc_attr($btn_class) . ' ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '>' . esc_html($prd_lbl[$y]) . ' <i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i></a></div>';
                                    }
                                } else {
                                    // Checking label field. It is empty or not
                                    if (!empty($prd_lbl[$y])) {
                                        $prd_btn = '<div class="catcbll_preview_button"><a href="' . $aurl . '" class="' . esc_attr($btn_class) . ' ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '><i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i> ' . esc_html($prd_lbl[$y]) . ' </a></div>';
                                    }
                                }
                                echo $prd_btn;
                            } // end for

                            if ($both == "both" && $add2cart == "add2cart" && ($catcbll_custom_btn_position == 'up' || $catcbll_custom_btn_position == 'left')) {
                                // For both variable and simple products, use the main template which handles variations automatically
                                woocommerce_template_single_add_to_cart();
                            }
                        } else {
                            // For both variable and simple products, use the main template which handles variations automatically
                            woocommerce_template_single_add_to_cart();
                        }
                        echo '<div class="catcbnl_mtxt">' . esc_html($content) . '</div>';
                    } else {
                        if ($catcbll_custom_btn_position == 'down' || $catcbll_custom_btn_position == 'right') {
                            if (($both == "both") && ($add2cart == "add2cart")) {
                                echo '<div class="catcbll-default-button-wrapper">';
                                woocommerce_template_loop_add_to_cart();
                                echo '</div>';
                            }
                        }

                        // Show custom buttons using loop (like archive.php)
                        for ($y = 0; $y < $atxtcnt; $y++) {
                            if (!empty($prd_url[$y])) {
                                $aurl = esc_url($prd_url[$y]);
                            } else {
                                $aurl = esc_url(site_url() . '/?add-to-cart=' . $product_id);
                            }

                            $prd_btn = '';
                            if ($catcbll_btn_icon_psn == 'right') {
                                if (!empty($prd_lbl[$y])) {
                                    $prd_btn = '<div class="catcbll_preview_button"><a href="' . $aurl . '" class="' . esc_attr($btn_class) . ' ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '>' . esc_html($prd_lbl[$y]) . ' <i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i></a></div>';
                                }
                            } else {
                                // Checking label field. It is empty or not
                                if (!empty($prd_lbl[$y])) {
                                    $prd_btn = '<div class="catcbll_preview_button"><a href="' . $aurl . '" class="' . esc_attr($btn_class) . ' ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '><i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i> ' . esc_html($prd_lbl[$y]) . '</a></div>';
                                }
                            }
                            echo $prd_btn;
                        } // end for each

                        // Show default button last if position is 'up' or 'left'
                        if ($catcbll_custom_btn_position == 'up' || $catcbll_custom_btn_position == 'left') {
                            if (($both == "both") && ($add2cart == "add2cart")) {
                                echo '<div class="catcbll-default-button-wrapper">';
                                woocommerce_template_loop_add_to_cart();
                                echo '</div>';
                            }
                        }
                    }
                } else {
                    // If display conditions not met, show default buttons
                    if (is_single()) {
                        // For single product pages, use the main template which handles both variable and simple products
                        woocommerce_template_single_add_to_cart();
                    } else {
                        // For shop/archive pages, show loop add to cart
                        woocommerce_template_loop_add_to_cart();
                    }
                }
                ?>
            </div>

        </div>
    <?php
    }

    /**
     * Get the current product ID dynamically
     */
    private function get_current_product_id()
    {
        global $post;

        // Check if we're on a single product page
        if (is_singular('product') && $post && $post->post_type === 'product') {
            return $post->ID;
        }

        // Check if we're in the WooCommerce loop
        if (is_shop() || is_product_category() || is_product_tag()) {
            global $product;
            if ($product && is_object($product)) {
                return $product->get_id();
            }
        }

        // Check for product ID in query vars
        if (isset($_GET['product_id'])) {
            return intval($_GET['product_id']);
        }

        // Check for product ID in post meta (for Elementor preview)
        if ($post && get_post_meta($post->ID, '_elementor_page_settings', true)) {
            $elementor_settings = get_post_meta($post->ID, '_elementor_page_settings', true);
            if (isset($elementor_settings['product_id'])) {
                return intval($elementor_settings['product_id']);
            }
        }

        return false;
    }

    /**
     * Apply plugin styling to the widget using variables from included file
     */
    private function apply_plugin_styling_from_variables()
    {
        global $catcbll_btn_bg, $catcbll_btn_fclr, $catcbll_btn_fsize, $catcbll_btn_radius, $display, $imp;
        global $catcbll_padding_top_bottom, $catcbll_padding_left_right, $catcbll_border_size, $catcbll_btn_border_clr;
        global $catcbll_btn_hvrclr, $catcbll_custom_btn_alignment, $btn_margin, $avada_style, $avada_hover;

        $css = '<style>';

        $css .= ':root {
            --wccb-text-align: '    . esc_html($catcbll_custom_btn_alignment) . ';
            --wccb-margin: '        . esc_html($btn_margin) . ';
            --wccb-display: '       . esc_html($display) . ';
            --wccb-border-radius: ' . esc_html($catcbll_btn_radius) . 'px ' . esc_html($imp) . ';
            --wccb-color: '         . esc_html($catcbll_btn_fclr) . ' ' . esc_html($imp) . ';
            --wccb-font-size: '     . esc_html($catcbll_btn_fsize) . 'px ' . esc_html($imp) . ';
            --wccb-padding: '       . esc_html($catcbll_padding_top_bottom) . 'px ' . esc_html($catcbll_padding_left_right) . 'px ' . esc_html($imp) . ';
            --wccb-border: '        . esc_html($catcbll_border_size) . 'px solid;
            --wccb-background-color: ' . esc_html($catcbll_btn_bg) . ' ' . esc_html($imp) . ';
            --wccb-border-color: '  . esc_html($catcbll_btn_border_clr) . ' ' . esc_html($imp) . ';
        }';


        /* In your theme’s stylesheet: */
        $css .= '.no-price .woocommerce-Price-amount, .no-price .price { display: none !important; }';

        // Button styling from variables
        if (!empty($catcbll_btn_bg)) {
            $css .= '.catcbll-product-button { background-color: ' . esc_attr($catcbll_btn_bg) . '; }';
        }

        if (!empty($catcbll_btn_fclr)) {
            $css .= '.catcbll-product-button { color: ' . esc_attr($catcbll_btn_fclr) . '; }';
        }

        if (!empty($catcbll_btn_fsize)) {
            $css .= '.catcbll-product-button { font-size: ' . esc_attr($catcbll_btn_fsize) . 'px; }';
        }

        if (!empty($catcbll_btn_radius)) {
            $css .= '.catcbll-product-button { border-radius: ' . esc_attr($catcbll_btn_radius) . 'px; }';
        }

        if (!empty($catcbll_padding_top_bottom) && !empty($catcbll_padding_left_right)) {
            $css .= '.catcbll-product-button { padding: ' . esc_attr($catcbll_padding_top_bottom) . 'px ' . esc_attr($catcbll_padding_left_right) . 'px; }';
        }

        if (!empty($catcbll_border_size) && !empty($catcbll_btn_border_clr)) {
            $css .= '.catcbll-product-button { border: ' . esc_attr($catcbll_border_size) . 'px solid ' . esc_attr($catcbll_btn_border_clr) . '; }';
        }

        // Button margin
        if (!empty($btn_margin)) {
            $css .= '.catcbll-product-button { margin: ' . esc_attr($btn_margin) . '; }';
        }

        // Hover effects
        if (!empty($catcbll_btn_hvrclr)) {
            $css .= '.catcbll-product-button:hover { background-color: ' . esc_attr($catcbll_btn_hvrclr) . '; color: #fff; }';
        }

        // Custom button alignment
        if (!empty($catcbll_custom_btn_alignment)) {
            $catcbll_custom_btn_alignment = ($catcbll_custom_btn_alignment == 'left') ? 'start' : $catcbll_custom_btn_alignment;
            $catcbll_custom_btn_alignment = ($catcbll_custom_btn_alignment == 'right') ? 'end' : $catcbll_custom_btn_alignment;
            $css .= '.catcbll-product-buttons { text-align: ' . esc_attr($catcbll_custom_btn_alignment) . '; }';
            $css .= '.catcbll-product-buttons { align-items: ' . esc_attr($catcbll_custom_btn_alignment) . '; }';
        }

        // Avada theme compatibility
        if (!empty($avada_style)) {
            $css .= '.catcbll-product-button { ' . esc_attr($avada_style) . ' }';
        }

        if (!empty($avada_hover)) {
            $css .= '.catcbll-product-button:hover { ' . esc_attr($avada_hover) . ' }';
        }

        $css .= '</style>';

        echo $css;
    }

    /**
     * Get inline styles for button using variables from included file
     */
    private function get_button_inline_styles_from_variables()
    {
        global $catcbll_btn_bg, $catcbll_btn_fclr, $catcbll_btn_fsize, $catcbll_btn_radius;
        global $catcbll_padding_top_bottom, $catcbll_padding_left_right, $catcbll_border_size, $catcbll_btn_border_clr;
        global $btn_margin, $avada_style;

        $styles = '';

        if (!empty($catcbll_btn_bg)) {
            $styles .= 'background-color: ' . esc_attr($catcbll_btn_bg) . ';';
        }

        if (!empty($catcbll_btn_fclr)) {
            $styles .= 'color: ' . esc_attr($catcbll_btn_fclr) . ';';
        }

        if (!empty($catcbll_btn_fsize)) {
            $styles .= 'font-size: ' . esc_attr($catcbll_btn_fsize) . 'px;';
        }

        if (!empty($catcbll_btn_radius)) {
            $styles .= 'border-radius: ' . esc_attr($catcbll_btn_radius) . 'px;';
        }

        if (!empty($catcbll_padding_top_bottom) && !empty($catcbll_padding_left_right)) {
            $styles .= 'padding: ' . esc_attr($catcbll_padding_top_bottom) . 'px ' . esc_attr($catcbll_padding_left_right) . 'px;';
        }

        if (!empty($catcbll_border_size) && !empty($catcbll_btn_border_clr)) {
            $styles .= 'border: ' . esc_attr($catcbll_border_size) . 'px solid ' . esc_attr($catcbll_btn_border_clr) . ';';
        }

        if (!empty($btn_margin)) {
            $styles .= 'margin: ' . esc_attr($btn_margin) . ';';
        }

        if (!empty($avada_style)) {
            $styles .= $avada_style;
        }

        return $styles;
    }

    /**
     * Render widget output in the editor.
     */
    protected function content_template()
    {
    ?>
        <div class="catcbll-product-widget">

            <div class="catcbll-editor-notice">
                <strong><?php echo esc_html__('Product Custom Buttons Widget', 'catcbll'); ?></strong><br>
                <?php echo esc_html__('This widget will automatically display buttons according to your plugin settings (Dual Button, Default WooCommerce Button, Custom ATC Button Per Product).', 'catcbll'); ?>
            </div>

            <# if (settings.show_product_info==='yes' ) { #>
                <div class="catcbll-product-info">

                    <# if (settings.show_product_image==='yes' ) { #>
                        <div class="catcbll-product-image">
                            <img src="https://via.placeholder.com/150" alt="Product Image">
                        </div>
                        <# } #>

                            <# if (settings.show_product_title==='yes' ) { #>
                                <h3 class="catcbll-product-title">
                                    <a href="#">Product Title</a>
                                </h3>
                                <# } #>

                                    <# if (settings.show_product_price==='yes' ) { #>
                                        <div class="catcbll-product-price">
                                            $99.99
                                        </div>
                                        <# } #>

                </div>
                <# } #>

                    <div class="catcbll-product-buttons">
                        <div class="catcbll-default-button-wrapper">
                            <button class="button">Add to Cart</button>
                        </div>
                        <div class="catcbll-custom-buttons-wrapper">
                            <a href="#" class="catcbll-product-button catcbll">
                                Custom Button 1
                            </a>
                            <a href="#" class="catcbll-product-button catcbll">
                                Custom Button 2
                            </a>
                        </div>
                    </div>

        </div>
<?php
    }
}
