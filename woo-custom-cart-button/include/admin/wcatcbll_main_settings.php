<section class="mainsec catcbll_general_sec" id="wcatcbll_stng">
    <form method="post" id="wcatbltn_option_save" class="">       
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 p-0">
                    <?php include(WCATCBLL_CART_INC . 'admin/wcatcbll_sidebar.php');?>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 p-0">
                    <div class="tab-content" id="catc-tabContent">
                        <div class="tab-pane fade p-3 active show" id="general-setting" role="tabpanel" aria-labelledby="general-setting-tab">                           
                            <?php include(WCATCBLL_CART_INC . 'tabs/general.php');?>
                        </div>
                        <div class="tab-pane fade p-3" id="layout-setting" role="tabpanel" aria-labelledby="layout-setting-tab">                        
                            <?php include(WCATCBLL_CART_INC . 'tabs/layout.php');?>
                        </div>
                        <div class="tab-pane fade p-3" id="shortcode-setting" role="tabpanel" aria-labelledby="shortcode-setting-tab">
                        <?php include(WCATCBLL_CART_INC.'tabs/shortcode.php') ?>
                        </div>
                        <div class="tab-pane fade p-3" id="ready-to-use-setting" role="tabpanel" aria-labelledby="ready-to-use-setting-tab">                           
                            <?php include(WCATCBLL_CART_INC.'tabs/ready-to-use.php') ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-3 p-0">
                    <div class="colbox d-flex justify-content-center p-3">
                        <div class="btn_preview_div catcbll_preview_button">
                            <?php
                            // Escaping output
                            $btn_class = esc_attr($catcbll_hide_2d_trans) . ' ' . esc_attr($catcbll_hide_btn_bghvr);
                            $btn_label = __('Add To Cart', 'catcbll');

                            if ($catcbll_btn_icon_psn == 'right') {
                            ?>
                                <a type="button" href="#" class="btn <?php echo esc_html($btn_class); ?> btn-lg wccbtn" id="btn_prvw">
                                    <?php echo esc_html($btn_label); ?>
                                    <?php if (!empty($catcbll_btn_icon_cls)) {
                                        echo '<i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i>';
                                    } ?>
                                </a>
                            <?php } else { ?>
                                <a type="button" href="#" class="btn <?php echo esc_html($btn_class); ?> btn-lg wccbtn" id="btn_prvw">
                                    <?php if (!empty($catcbll_btn_icon_cls)) {
                                        echo '<i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i>';
                                    } ?>
                                    <?php echo esc_html($btn_label); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<div id="wcbnl_overlay">
    <div class="cv-spinner">
        <img src="<?php echo WCATCBLL_CART_IMG . 'spinner.svg' ?>">
    </div>
</div>