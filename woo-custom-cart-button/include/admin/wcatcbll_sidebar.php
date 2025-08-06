<?php
if (isset($_GET['tab']) && !empty($_GET['tab'])) {
    $tab = $_GET['tab'];
} else {
    $tab = 'general-setting';
}

$menus = array(
    'general'             => array('fa-cog', __('General', 'catcbll')),
    'layout'             => array('fa-table', __('Layout & Style', 'catcbll')),
    'shortcode'         => array('fa-code', __('Shortcode', 'catcbll')),
    'ready-to-use'         => array('fa-book', __('Ready to use', 'catcbll')),
);
$extand_menu = apply_filters('wcatcbnl_extand_menu', $menus);
$navmenu = '';
foreach ($extand_menu as $key => $val) {

    if (isset($_GET['page']) && $_GET['page'] == 'hwx-wccb') {
        $tab_url = add_query_arg(array(
            'page' => esc_html('hwx-wccb'),
            'tab' => esc_html($key . '-setting'),
        ), admin_url('admin.php'));
    }
    if (esc_html($tab) == esc_html($key . '-setting')) {
        $tab_active =  'active';
    } else {
        $tab_active = '';
    }

    $navmenu .= '<li class="' . $tab_active . '"><a class="nav-link ' . $tab_active . ' text-white" id="' . $key . '-setting-tab" data-bs-toggle="tab" data-bs-target="#' . $key . '-setting" href="#' . $key . '-setting" role="tab" aria-controls="' . $key . '-setting" aria-selected="true"><i class="fas ' . esc_html($val[0]) . '"></i> ' . esc_html($val[1]) . '</a></li>';
}

?>
<!-- Side Nav Bar Start-->
<div class="side-navbar active-nav d-flex flex-column py-3 px-2" id="sidebar">
    <ul class="nav flex-column text-white w-100" role="tablist"> <?php echo $navmenu; ?> </ul>
    <button type="submit" name="submit" id="submit_settings" class="btn btn-primary"><?php echo esc_html__('Save Changes', 'catcbll'); ?></button>
    <input type="hidden" id="ready_to_use" name="catcbll_ready_to_use" value="<?php echo esc_attr($catcbll_ready_to_use); ?>" />
</div>
<!-- Side Nav Bar End-->