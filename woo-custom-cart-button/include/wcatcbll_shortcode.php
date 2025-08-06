<?php
// Add TinyMCE button for shortcode
function wcatcbll_add_mce()
{
	if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) return;
	if ('true' === get_user_option('rich_editing')) {
		add_filter('mce_external_plugins', 'wcatcbll_add_tinymce_plugin');
		add_filter('mce_buttons', 'wcatcbll_register_mce_button');
	}
}
add_action('admin_head', 'wcatcbll_add_mce');

function wcatcbll_register_mce_button($buttons)
{
	$buttons[] = 'wccb_shrtcd';
	return $buttons;
}

function wcatcbll_add_tinymce_plugin($plugin_array)
{
	$plugin_array['Wccbinsertshortcode'] = WCATCBLL_CART_JS . 'wcatcbll_shortcode.js';
	return $plugin_array;
}

if (!function_exists('wcatcbll_shortcode')) {
	function wcatcbll_shortcode($atts = array())
	{
		$astra_theme = get_option('template');

		$pid_list = isset($atts['pid']) ? sanitize_text_field($atts['pid']) : '';
		$pids = !empty($pid_list) ? explode(',', $pid_list) : array();
		$pid_count = count($pids);

		$settings = get_option('_woo_catcbll_all_settings', array());
		$default_vals = array(
			'catcbll_btn_bg' => '',
			'catcbll_btn_fsize' => '',
			'catcbll_btn_fclr' => '',
			'catcbll_btn_icon_cls' => '',
			'catcbll_btn_border_clr' => '',
			'catcbll_border_size' => '',
			'catcbll_btn_icon_psn' => '',
			'catcbll_both_btn' => '',
			'catcbll_add2_cart' => '',
			'catcbll_custom' => '',
			'catcbll_btn_open_new_tab' => '',
			'catcbll_margin_top' => '',
			'catcbll_margin_right' => '',
			'catcbll_margin_bottom' => '',
			'catcbll_margin_left' => '',
			'catcbll_custom_btn_position' => '',
			'catcbll_hide_btn_bghvr' => '',
			'catcbll_btn_hvrclr' => '',
			'catcbll_btn_radius' => '',
			'catcbll_padding_top_bottom' => '',
			'catcbll_padding_left_right' => '',
			'catcbll_custom_btn_alignment' => ''
		);

		extract(wp_parse_args($settings, $default_vals));
		$shortcode_defaults = array(
			'background'     => (isset($atts['background']) && !empty($atts['background']))
				? sanitize_text_field($atts['background'])
				: $catcbll_btn_bg,

			'font_size'      => (isset($atts['font_size']) && !empty($atts['font_size']))
				? sanitize_text_field($atts['font_size'])
				: $catcbll_btn_fsize,

			'font_color'     => (isset($atts['font_color']) && !empty($atts['font_color']))
				? sanitize_text_field($atts['font_color'])
				: $catcbll_btn_fclr,

			'font_awesome'   => (isset($atts['font_awesome']) && !empty($atts['font_awesome']))
				? sanitize_text_field($atts['font_awesome'])
				: $catcbll_btn_icon_cls,

			'border_color'   => (isset($atts['border_color']) && !empty($atts['border_color']))
				? sanitize_text_field($atts['border_color'])
				: $catcbll_btn_border_clr,

			'border_size'    => (isset($atts['border_size']) && !empty($atts['border_size']))
				? sanitize_text_field($atts['border_size'])
				: $catcbll_border_size,

			'icon_position'  => (isset($atts['icon_position']) && !empty($atts['icon_position']))
				? sanitize_text_field($atts['icon_position'])
				: $catcbll_btn_icon_psn,

			'image'          => (isset($atts['image']) && !empty($atts['image']))
				? sanitize_text_field($atts['image'])
				: '',
		);



		foreach ($shortcode_defaults as $key => $default) {

			if (isset($atts[$key]) && !is_array($atts[$key])) {
				$$key = sanitize_text_field($atts[$key]);
			} else {
				$$key = $default;
			}
		}

		$btn_margin = esc_attr($catcbll_margin_top) . 'px ' . esc_attr($catcbll_margin_right) . 'px ' . esc_attr($catcbll_margin_bottom) . 'px ' . esc_attr($catcbll_margin_left) . 'px';
		$display = in_array($catcbll_custom_btn_position, ['left', 'right']) ? 'inline-flex' : 'block';
		$imp = (!empty($catcbll_hide_btn_bghvr) || !empty($catcbll_btn_hvrclr)) ? '' : '!important';
		$btn_class = empty($catcbll_hide_btn_bghvr) && empty($catcbll_btn_hvrclr) ? 'button' : 'btn';
		$avada_style = ($astra_theme === 'Avada') ? 'display: inline-block;float: none !important;' : '';

		$output = '<style>
	form.cart { display:inline-block; }
	.catcbll_preview_button {
		text-align: ' . esc_attr($catcbll_custom_btn_alignment) . ';
		margin: ' . esc_attr($catcbll_margin_top) . 'px ' . esc_attr($catcbll_margin_right) . 'px ' . esc_attr($catcbll_margin_bottom) . 'px ' . esc_attr($catcbll_margin_left) . 'px;
		display: ' . esc_attr($display) . ';
	}
	.catcbll_preview_button .fa {
		font-family: FontAwesome ' . $imp . ';
	}
	.' . esc_attr($catcbll_hide_btn_bghvr) . ':before {
		border-radius: ' . esc_attr($catcbll_btn_radius) . 'px ' . $imp . ';
		background: ' . esc_attr($catcbll_btn_hvrclr) . ' ' . $imp . ';
		color: #fff ' . $imp . ';
	}
	.catcbll_preview_button .catcbll {
		' . $avada_style . '
		color: ' . esc_attr($font_color) . ' ' . $imp . ';
		font-size: ' . esc_attr($font_size) . 'px ' . $imp . ';
		padding: ' . esc_attr($catcbll_padding_top_bottom) . 'px ' . esc_attr($catcbll_padding_left_right) . 'px ' . $imp . ';
		border: ' . esc_attr($border_size) . 'px solid ' . esc_attr($border_color) . ' ' . $imp . ';
		border-radius: ' . esc_attr($catcbll_btn_radius) . 'px ' . $imp . ';
		background-color: ' . esc_attr($background) . ' ' . $imp . ';
	}
	.catcbll_preview_button a {
		text-decoration: none ' . $imp . ';
	}
	.catcbll:hover {
		border-radius: ' . esc_attr($catcbll_btn_radius) . 'px ' . $imp . ';
		background-color: ' . esc_attr($catcbll_btn_hvrclr) . ' ' . $imp . ';
		color: #fff ' . $imp . ';
	}
</style>';


		if ($pid_count > 0) {
			foreach ($pids as $pid) {
				if (get_post_type($pid) === 'product') {
					$pimg_id = get_post_thumbnail_id($pid);
					$pimg_url = wp_get_attachment_url($pimg_id);
					$pimg_url = esc_url($pimg_url);

					$prd_lbl_raw = get_post_meta($pid, '_catcbll_btn_label', true);

					//$prd_lbl = is_array($prd_lbl_raw) ? reset($prd_lbl_raw) : $prd_lbl_raw;

					$prd_url_raw = get_post_meta($pid, '_catcbll_btn_link', true);
					//$prd_url = is_array($prd_url_raw) ? '' : esc_url($prd_url_raw);

					$trgtblnk = ($catcbll_btn_open_new_tab == '1') ? "target='_blank'" : '';

					// Render your custom button here
					foreach ($prd_lbl_raw as $key => $prd_lbl) {
						$prd_url = $prd_url_raw[$key];
						$output .= '<div class="catcbll_preview_button">';
						$output .= '<a class="catcbll ' . esc_attr($btn_class) . '" href="' . $prd_url . '" ' . $trgtblnk . '>' . esc_html($prd_lbl) . '</a>';
						$output .= '</div>';
					}
				}
			}
		} else {
			$output .= esc_html__('Please Write Us PID Parameter In Shortcode', 'catcbll') . " ([catcbll pid='Please change it to your product ID'])";
		}
		
		return $output;
	}
}
add_shortcode('catcbll', 'wcatcbll_shortcode');
