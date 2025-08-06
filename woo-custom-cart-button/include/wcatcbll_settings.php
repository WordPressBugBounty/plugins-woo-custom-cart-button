<?php

// Save cart button setting in option.php
function wcatcbll_wccb_options_page()
{
	include(WCATCBLL_CART_INC . 'wcatcbll_btn_2dhvr.php');
	$catcbll_settings = get_option('_woo_catcbll_all_settings');

	/* echo "<pre>";
	print_r($catcbll_settings);
	echo "</pre>"; */

	$both             = isset($catcbll_settings['catcbll_both_btn']) ? sanitize_text_field($catcbll_settings['catcbll_both_btn']) : '';
	$add2cart         = isset($catcbll_settings['catcbll_add2_cart']) ? sanitize_text_field($catcbll_settings['catcbll_add2_cart']) : '';
	$custom           = isset($catcbll_settings['catcbll_custom']) ? sanitize_text_field($catcbll_settings['catcbll_custom']) : '';
	$global           = isset($catcbll_settings['catcbll_cart_global']) ? sanitize_text_field($catcbll_settings['catcbll_cart_global']) : '';
	$shop             = isset($catcbll_settings['catcbll_cart_shop']) ? sanitize_text_field($catcbll_settings['catcbll_cart_shop']) : '';
	$single           = isset($catcbll_settings['catcbll_cart_single_product']) ? sanitize_text_field($catcbll_settings['catcbll_cart_single_product']) : '';
	$btn_opnt         = !empty($catcbll_settings['catcbll_btn_open_new_tab']) ? 1 : 0;
	$catcbll_ready_to_use = !empty($catcbll_settings['catcbll_ready_to_use']) ? $catcbll_settings['catcbll_ready_to_use'] : '';

	$catcbll_custom_btn_alignment = isset($catcbll_settings['catcbll_custom_btn_alignment']) ? sanitize_text_field($catcbll_settings['catcbll_custom_btn_alignment']) : '';

	$catcbll_btn_fsize      = isset($catcbll_settings['catcbll_btn_fsize']) && is_numeric($catcbll_settings['catcbll_btn_fsize']) ? (int)$catcbll_settings['catcbll_btn_fsize'] : '';
	$catcbll_border_size    = isset($catcbll_settings['catcbll_border_size']) && is_numeric($catcbll_settings['catcbll_border_size']) ? (int)$catcbll_settings['catcbll_border_size'] : '';
	$catcbll_btn_radius     = isset($catcbll_settings['catcbll_btn_radius']) && is_numeric($catcbll_settings['catcbll_btn_radius']) ? (int)$catcbll_settings['catcbll_btn_radius'] : '';
	$catcbll_custom_btn_position  = isset($catcbll_settings['catcbll_custom_btn_position']) ? sanitize_text_field($catcbll_settings['catcbll_custom_btn_position']) : '';

	$catcbll_btn_bg         = isset($catcbll_settings['catcbll_btn_bg']) ? sanitize_text_field($catcbll_settings['catcbll_btn_bg']) : '';
	$catcbll_btn_fclr       = isset($catcbll_settings['catcbll_btn_fclr']) ? sanitize_text_field($catcbll_settings['catcbll_btn_fclr']) : '';
	$catcbll_btn_border_clr = isset($catcbll_settings['catcbll_btn_border_clr']) ? sanitize_text_field($catcbll_settings['catcbll_btn_border_clr']) : '';
	$catcbll_btn_hvrclr     = isset($catcbll_settings['catcbll_btn_hvrclr']) ? sanitize_text_field($catcbll_settings['catcbll_btn_hvrclr']) : '';


	$catcbll_padding_top_bottom = isset($catcbll_settings['catcbll_padding_top_bottom']) && is_numeric($catcbll_settings['catcbll_padding_top_bottom']) ? $catcbll_settings['catcbll_padding_top_bottom'] : '';
	$catcbll_padding_left_right = isset($catcbll_settings['catcbll_padding_left_right']) && is_numeric($catcbll_settings['catcbll_padding_left_right']) ? $catcbll_settings['catcbll_padding_left_right'] : '';

	$catcbll_margin_top    = isset($catcbll_settings['catcbll_margin_top']) ? sanitize_text_field($catcbll_settings['catcbll_margin_top']) : '';
	$catcbll_margin_right  = isset($catcbll_settings['catcbll_margin_right']) ? sanitize_text_field($catcbll_settings['catcbll_margin_right']) : '';
	$catcbll_margin_bottom = isset($catcbll_settings['catcbll_margin_bottom']) ? sanitize_text_field($catcbll_settings['catcbll_margin_bottom']) : '';
	$catcbll_margin_left   = isset($catcbll_settings['catcbll_margin_left']) ? sanitize_text_field($catcbll_settings['catcbll_margin_left']) : '';

	$catcbll_btn_icon_cls  = isset($catcbll_settings['catcbll_btn_icon_cls']) ? sanitize_text_field($catcbll_settings['catcbll_btn_icon_cls']) : '';
	$catcbll_hide_2d_trans = !empty($catcbll_settings['catcbll_hide_2d_trans']) ? $catcbll_settings['catcbll_hide_2d_trans'] : '';
	$catcbll_hide_btn_bghvr = !empty($catcbll_settings['catcbll_hide_btn_bghvr']) ? $catcbll_settings['catcbll_hide_btn_bghvr'] : '';

	$catcbll_btn_icon_psn  = isset($catcbll_settings['catcbll_btn_icon_psn']) ? sanitize_text_field($catcbll_settings['catcbll_btn_icon_psn']) : '';




	if (!current_user_can('manage_options')) {
		wp_die(esc_html__('You do not have sufficient permissions to access this page', 'catcbll'));
	}

	include(WCATCBLL_CART_INC . 'admin/wcatcbll_topbar.php');
	include(WCATCBLL_CART_INC . 'admin/wcatcbll_all_setting_files.php');
}