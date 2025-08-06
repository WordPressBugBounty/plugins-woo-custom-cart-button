<?php
// Register and load the widget
function wcatcbll_widget() {
    register_widget('wccb_widget');
}
add_action('widgets_init', 'wcatcbll_widget');

// Creating the widget
class wccb_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'wccb_widget',
            __('Custom Cart Button', 'catcbll'),
            array('description' => __('Wcatcbll Product show', 'catcbll'))
        );
    }

    // Widget front-end
    public function widget($args, $instance) {
        global $product;

        $astra_theme = get_option('template');
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : __('Products', 'catcbll');
        $nbr_prd = isset($instance['nprd']) ? intval($instance['nprd']) : 2;

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];

        $arg = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 100,
            'meta_query' => array(
                array(
                    'key' => '_catcbll_btn_label',
                    'compare' => 'EXISTS',
                ),
            ),
        );
        $dbResult = new WP_Query($arg);
        $posts = $dbResult->posts;
        $count = min($dbResult->post_count, $nbr_prd);

        // Button styling settings
        $settings = get_option('_woo_catcbll_all_settings', array());
        // Explicitly define all used variables from settings
        $catcbll_btn_bg = isset($settings['catcbll_btn_bg']) ? $settings['catcbll_btn_bg'] : '';
        $catcbll_btn_fsize = isset($settings['catcbll_btn_fsize']) ? $settings['catcbll_btn_fsize'] : '';
        $catcbll_btn_fclr = isset($settings['catcbll_btn_fclr']) ? $settings['catcbll_btn_fclr'] : '';
        $catcbll_btn_icon_cls = isset($settings['catcbll_btn_icon_cls']) ? $settings['catcbll_btn_icon_cls'] : '';
        $catcbll_btn_border_clr = isset($settings['catcbll_btn_border_clr']) ? $settings['catcbll_btn_border_clr'] : '';
        $catcbll_border_size = isset($settings['catcbll_border_size']) ? $settings['catcbll_border_size'] : '';
        $catcbll_btn_radius = isset($settings['catcbll_btn_radius']) ? $settings['catcbll_btn_radius'] : '';
        $catcbll_padding_top_bottom = isset($settings['catcbll_padding_top_bottom']) ? $settings['catcbll_padding_top_bottom'] : '';
        $catcbll_padding_left_right = isset($settings['catcbll_padding_left_right']) ? $settings['catcbll_padding_left_right'] : '';
        $catcbll_btn_hvrclr = isset($settings['catcbll_btn_hvrclr']) ? $settings['catcbll_btn_hvrclr'] : '';
        $catcbll_hide_btn_bghvr = isset($settings['catcbll_hide_btn_bghvr']) ? $settings['catcbll_hide_btn_bghvr'] : '';
        $catcbll_hide_2d_trans = isset($settings['catcbll_hide_2d_trans']) ? $settings['catcbll_hide_2d_trans'] : '';
        $catcbll_custom_btn_alignment = isset($settings['catcbll_custom_btn_alignment']) ? $settings['catcbll_custom_btn_alignment'] : '';
        $catcbll_custom_btn_position = isset($settings['catcbll_custom_btn_position']) ? $settings['catcbll_custom_btn_position'] : '';
        $catcbll_both_btn = isset($settings['catcbll_both_btn']) ? $settings['catcbll_both_btn'] : '';
        $catcbll_add2_cart = isset($settings['catcbll_add2_cart']) ? $settings['catcbll_add2_cart'] : '';
        $catcbll_custom = isset($settings['catcbll_custom']) ? $settings['catcbll_custom'] : '';
        $catcbll_btn_open_new_tab = isset($settings['catcbll_btn_open_new_tab']) ? $settings['catcbll_btn_open_new_tab'] : '';
        $catcbll_btn_icon_psn = isset($settings['catcbll_btn_icon_psn']) ? $settings['catcbll_btn_icon_psn'] : '';
        $catcbll_margin_top = isset($settings['catcbll_margin_top']) ? $settings['catcbll_margin_top'] : 0;
        $catcbll_margin_right = isset($settings['catcbll_margin_right']) ? $settings['catcbll_margin_right'] : 0;
        $catcbll_margin_bottom = isset($settings['catcbll_margin_bottom']) ? $settings['catcbll_margin_bottom'] : 0;
        $catcbll_margin_left = isset($settings['catcbll_margin_left']) ? $settings['catcbll_margin_left'] : 0;

        // Build CSS inline
        $btn_class = (!empty($catcbll_hide_btn_bghvr) || !empty($catcbll_btn_hvrclr)) ? 'btn' : 'button';
        $imp = (!empty($catcbll_hide_btn_bghvr) || !empty($catcbll_btn_hvrclr)) ? '' : '!important';
        $avada_style = ($astra_theme === 'Avada') ? 'display: inline-block;float: none !important;' : '';
        $btn_margin = intval($catcbll_margin_top) . 'px ' . intval($catcbll_margin_right) . 'px ' . intval($catcbll_margin_bottom) . 'px ' . intval($catcbll_margin_left) . 'px';

        echo '<style>
            .widget_wccb_widget .catcbll_preview_button{text-align:' . esc_attr($catcbll_custom_btn_alignment) . ';margin:' . esc_attr($btn_margin) . ';}
            .widget_wccb_widget .catcbll_preview_button .fa{font-family:FontAwesome ' . $imp . '}
            .widget_wccb_widget .' . esc_attr($catcbll_hide_btn_bghvr) . ':before{border-radius:' . intval($catcbll_btn_radius) . 'px ' . $imp . ';background:' . esc_attr($catcbll_btn_hvrclr) . ' ' . $imp . ';color:#fff ' . $imp . ';} 
            .widget_wccb_widget .catcbll_preview_button .catcbll{' . esc_attr($avada_style) . 'color:' . esc_attr($catcbll_btn_fclr) . ' ' . $imp . ';font-size:' . intval($catcbll_btn_fsize) . 'px ' . $imp . ';padding:' . intval($catcbll_padding_top_bottom) . 'px ' . intval($catcbll_padding_left_right) . 'px ' . $imp . ';border:' . intval($catcbll_border_size) . 'px solid ' . esc_attr($catcbll_btn_border_clr) . ' ' . $imp . ';border-radius:' . intval($catcbll_btn_radius) . 'px ' . $imp . ';background-color:' . esc_attr($catcbll_btn_bg) . ' ' . $imp . ';}
            .widget_wccb_widget .catcbll_preview_button a{text-decoration: none ' . $imp . ';}';
        if (empty($catcbll_hide_btn_bghvr)) {
            echo '.widget_wccb_widget .catcbll:hover{border-radius:' . intval($catcbll_btn_radius) . 'px ' . $imp . ';background-color:' . esc_attr($catcbll_btn_hvrclr) . ' ' . $imp . ';color:#fff ' . $imp . ';}';
        }
        echo '.widget_wccb_widget .quantity, .widget_wccb_widget .buttons_added {display:inline-block;}
              .widget_wccb_widget .stock{display:none}
        </style>';

        // Loop through products
        for ($x = 0; $x < $count; $x++) {
            $post_id = $posts[$x]->ID;

            $pimg_id = get_post_thumbnail_id($post_id);
            $pimg_url = wp_get_attachment_url($pimg_id);
            echo '<img src="' . esc_url($pimg_url) . '" class="prd_img_shrtcd" />';

            $prd_lbl = get_post_meta($post_id, '_catcbll_btn_label', true);
            $prd_url = get_post_meta($post_id, '_catcbll_btn_link', true);
            $prd_lbl = is_array($prd_lbl) ? $prd_lbl : array($prd_lbl);
            $prd_url = is_array($prd_url) ? $prd_url : array($prd_url);

            $trgtblnk = ($catcbll_btn_open_new_tab == "1") ? "target='_blank'" : '';

            if (!empty($catcbll_custom) && $catcbll_custom === 'custom') {
                foreach ($prd_lbl as $i => $label) {
                    if (!empty($label)) {
                        $link = isset($prd_url[$i]) ? $prd_url[$i] : '#';
                        $icon = '<i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i>';
                        $btn = ($catcbll_btn_icon_psn === 'right')
                            ? esc_html($label) . ' ' . $icon
                            : $icon . ' ' . esc_html($label);
                        echo '<div class="catcbll_preview_button"><a href="' . esc_url($link) . '" class="' . esc_attr($btn_class) . ' btn-lg catcbll ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . $trgtblnk . '>' . $btn . '</a></div>';
                    }
                }

                if ($catcbll_both_btn === 'both' && $catcbll_add2_cart === 'add2cart') {
                    $product = wc_get_product($post_id);
                    if ($product && $product->is_type('simple')) {
                        echo do_shortcode('[add_to_cart id="' . intval($post_id) . '" show_price="false" style=""]');
                    }
                }
            }
        }

        echo $args['after_widget'];
    }

    // Backend form
    public function form($instance) {
        $title = !empty($instance['title']) ? esc_attr($instance['title']) : __('New title', 'catcbll');
        $nprd = !empty($instance['nprd']) ? esc_attr($instance['nprd']) : '2';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'catcbll'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('nprd')); ?>"><?php esc_html_e('Number of Products:', 'catcbll'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('nprd')); ?>" name="<?php echo esc_attr($this->get_field_name('nprd')); ?>" type="number" min="1" value="<?php echo esc_attr($nprd); ?>" />
        </p>
        <?php
    }

    // Updating widget
    public function update($new_instance, $old_instance) {
        return array(
            'title' => (!empty($new_instance['title'])) ? wp_strip_all_tags($new_instance['title']) : '',
            'nprd'  => (!empty($new_instance['nprd'])) ? intval($new_instance['nprd']) : 2,
        );
    }
}
?>
