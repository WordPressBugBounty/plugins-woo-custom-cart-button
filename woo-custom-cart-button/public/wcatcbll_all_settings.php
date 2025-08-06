<?php
global $product;

/* Button styling settings */
$catcbll_settings = get_option('_woo_catcbll_all_settings');
// echo "<pre>";
// print_r($catcbll_settings);
// echo "</pre>";
//button display setting
$both             = isset($catcbll_settings['catcbll_both_btn']) ? sanitize_text_field($catcbll_settings['catcbll_both_btn']) : '';
$add2cart         = isset($catcbll_settings['catcbll_add2_cart']) ? sanitize_text_field($catcbll_settings['catcbll_add2_cart']) : '';
$custom           = isset($catcbll_settings['catcbll_custom']) ? sanitize_text_field($catcbll_settings['catcbll_custom']) : '';

$global           = isset($catcbll_settings['catcbll_cart_global']) ? sanitize_text_field($catcbll_settings['catcbll_cart_global']) : '';
$shop             = isset($catcbll_settings['catcbll_cart_shop']) ? sanitize_text_field($catcbll_settings['catcbll_cart_shop']) : '';
$single           = isset($catcbll_settings['catcbll_cart_single_product']) ? sanitize_text_field($catcbll_settings['catcbll_cart_single_product']) : '';

// open new tab
$btn_opnt_new_tab = !empty($catcbll_settings['catcbll_btn_open_new_tab']) ? 1 : 0;
$catcbll_btn_icon_psn  = isset($catcbll_settings['catcbll_btn_icon_psn']) ? sanitize_text_field($catcbll_settings['catcbll_btn_icon_psn']) : '';
$catcbll_btn_icon_cls  = isset($catcbll_settings['catcbll_btn_icon_cls']) ? sanitize_text_field($catcbll_settings['catcbll_btn_icon_cls']) : '';
$catcbll_hide_2d_trans = !empty($catcbll_settings['catcbll_hide_2d_trans']) ? 1 : 0;
$catcbll_hide_btn_bghvr = !empty($catcbll_settings['catcbll_hide_btn_bghvr']) ? 1 : 0;

$catcbll_custom_btn_alignment = isset($catcbll_settings['catcbll_custom_btn_alignment']) ? sanitize_text_field($catcbll_settings['catcbll_custom_btn_alignment']) : '';

$catcbll_btn_fsize      = isset($catcbll_settings['catcbll_btn_fsize']) && is_numeric($catcbll_settings['catcbll_btn_fsize']) ? (int)$catcbll_settings['catcbll_btn_fsize'] : '';
$catcbll_border_size    = isset($catcbll_settings['catcbll_border_size']) && is_numeric($catcbll_settings['catcbll_border_size']) ? (int)$catcbll_settings['catcbll_border_size'] : '';
$catcbll_btn_radius     = isset($catcbll_settings['catcbll_btn_radius']) && is_numeric($catcbll_settings['catcbll_btn_radius']) ? (int)$catcbll_settings['catcbll_btn_radius'] : '';

$catcbll_btn_bg         = isset($catcbll_settings['catcbll_btn_bg']) ? sanitize_text_field($catcbll_settings['catcbll_btn_bg']) : '';
$catcbll_btn_fclr       = isset($catcbll_settings['catcbll_btn_fclr']) ? sanitize_text_field($catcbll_settings['catcbll_btn_fclr']) : '';
$catcbll_btn_border_clr = isset($catcbll_settings['catcbll_btn_border_clr']) ? sanitize_text_field($catcbll_settings['catcbll_btn_border_clr']) : '';
$catcbll_btn_hvrclr     = isset($catcbll_settings['catcbll_btn_hvrclr']) ? sanitize_text_field($catcbll_settings['catcbll_btn_hvrclr']) : '';

$catcbll_padding_top_bottom = isset($catcbll_settings['catcbll_padding_top_bottom']) && is_numeric($catcbll_settings['catcbll_padding_top_bottom']) ? $catcbll_settings['catcbll_padding_top_bottom'] : '';
$catcbll_padding_left_right = isset($catcbll_settings['catcbll_padding_left_right']) && is_numeric($catcbll_settings['catcbll_padding_left_right']) ? $catcbll_settings['catcbll_padding_left_right'] : '';



/* Button Margin */
$catcbll_margin_top    = isset($catcbll_settings['catcbll_margin_top']) && is_numeric($catcbll_settings['catcbll_margin_top']) ? $catcbll_settings['catcbll_margin_top'] : 0;
$catcbll_margin_right  = isset($catcbll_settings['catcbll_margin_right']) && is_numeric($catcbll_settings['catcbll_margin_right']) ? $catcbll_settings['catcbll_margin_right'] : 0;
$catcbll_margin_bottom = isset($catcbll_settings['catcbll_margin_bottom']) && is_numeric($catcbll_settings['catcbll_margin_bottom']) ? $catcbll_settings['catcbll_margin_bottom'] : 0;
$catcbll_margin_left   = isset($catcbll_settings['catcbll_margin_left']) && is_numeric($catcbll_settings['catcbll_margin_left']) ? $catcbll_settings['catcbll_margin_left'] : 0;




$btn_margin = "{$catcbll_margin_top}px {$catcbll_margin_right}px {$catcbll_margin_bottom}px {$catcbll_margin_left}px";

/* Get product label and url in database */
$pid     = $product->get_id();
$prd_lbl = get_post_meta($pid, '_catcbll_btn_label', true);
$prd_url = get_post_meta($pid, '_catcbll_btn_link', true);

//count button values
$atxtcnt = is_array($prd_lbl) ? count($prd_lbl) : '';

$trgtblnk = ($btn_opnt_new_tab == "1") ? "target='_blank'" : '';

/* positions */
$catcbll_custom_btn_position = isset($catcbll_settings['catcbll_custom_btn_position']) ? sanitize_text_field($catcbll_settings['catcbll_custom_btn_position']) : '';
$display = in_array($catcbll_custom_btn_position, ['left', 'right']) ? 'inline-flex' : 'block';

$catcbll_hide_btn_bghvr = !empty($catcbll_settings['catcbll_hide_btn_bghvr']) ? 1 : 0;

if ($catcbll_hide_btn_bghvr || !empty($catcbll_btn_hvrclr)) {
    $btncls = 'btn btn-lg catcbll';
    $imp = '';
} else {
    $btncls = 'button btn-lg catcbll';
    $imp = '!important';
}

$catcbll_ready_to_use = isset($catcbll_settings['catcbll_ready_to_use']) ? sanitize_text_field($catcbll_settings['catcbll_ready_to_use']) : '';
$btn_class = !empty($catcbll_ready_to_use) ? $catcbll_ready_to_use : $btncls;

$astra_active_or_not = isset($catcbll_settings['astra_active_or_not']) ? sanitize_text_field($catcbll_settings['astra_active_or_not']) : '';

if ($astra_active_or_not === 'Avada') {
    $avada_style = 'display: inline-block;float: none !important;';
    $avada_hover = 'margin-left: 0px !important;';
} else {
    $avada_style = '';
    $avada_hover = '';
}

$moreinfo = get_post_meta($pid, '_catcbll_more_info', true);
if (is_array($moreinfo)) {
    $content = '';
} else {
    $content = (!empty($moreinfo)) ? $moreinfo : '';
}
