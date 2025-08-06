<div class="colbox m-0 p-0 card">
    <h6 class="brdrbtm card-header"><?php echo esc_html__("Cart Button's Settings", "catcbll"); ?></h6>
    <div class="card-body">
        <!-- Cart Button's Settings-->
        <!-- Both Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Dual Button", "catcbll"); ?></label>
                <label class="switch">
                    <input type="checkbox" class="button1" name="catcbll_both_btn" <?php checked($both, 'both'); ?> value="both" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Both End-->
        <!-- Default Add To Cart Per Product Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Default WooCommerce Button", "catcbll"); ?></label>
                <label class="switch">
                    <input type="checkbox" class="button2" id="wcatcbll_add2_cart" name="catcbll_add2_cart" <?php checked($add2cart, 'add2cart'); ?> value="add2cart" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Default Add To Cart Per Product End-->
        <!-- Custom Button Per Product Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Custom ATC Button Per Product", "catcbll"); ?></label>
                <label class="switch">
                    <input type="checkbox" class="button3" id="wcatcbll_custom" name="catcbll_custom" <?php checked($custom, 'custom'); ?> value="custom" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Custom Button Per Product End-->
        <!-- Custom Button Position Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Custom Button Position", "catcbll"); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html__("Custom button position according to the default WooCommerce product's button.", 'catcbll'); ?></span>
                    </div>
                </label>
                <select name="catcbll_custom_btn_position" id="wcatcbll_custom_btn_position">
                    <option value="up" <?php selected($catcbll_custom_btn_position, 'up'); ?>><?php echo esc_html__("Up", "catcbll"); ?></option>
                    <option value="down" <?php selected($catcbll_custom_btn_position, 'down'); ?>><?php echo esc_html__("Down", "catcbll"); ?></option>
                    <option value="left" <?php selected($catcbll_custom_btn_position, 'left'); ?>><?php echo esc_html__("Left", "catcbll"); ?></option>
                    <option value="right" <?php selected($catcbll_custom_btn_position, 'right'); ?>><?php echo esc_html__("Right", "catcbll"); ?></option>
                </select>
            </div>
        </div>
        <!-- Custom Button Position End-->
        <!-- Custom Button Alignment Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Custom Button Alignment", "catcbll"); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html__("Custom button alignment according to the default WooCommerce product's title.", 'catcbll'); ?></span>
                    </div>
                </label>
                <select name="catcbll_custom_btn_alignment" id="catcbll_custom_btn_alignment">
                    <option value="left" <?php selected($catcbll_custom_btn_alignment, 'left'); ?>><?php echo esc_html__("Left", "catcbll"); ?></option>
                    <option value="right" <?php selected($catcbll_custom_btn_alignment, 'right'); ?>><?php echo esc_html__("Right", "catcbll"); ?></option>
                    <option value="center" <?php selected($catcbll_custom_btn_alignment, 'center'); ?>><?php echo esc_html__("Center", "catcbll"); ?></option>
                </select>
            </div>
        </div>
        <!-- Custom Button Alignment End-->
        <!-- Cart Button's Settings End-->
    </div>
</div>
<!-- 1st Box Cart Button's Settings End-->

<!-- 2nd Box Custom Button Display Start-->
<div class="colbox mt-3 m-0 p-0 card">
    <h6 class="brdrbtm card-header"><?php echo esc_html__("Custom Button Display", "catcbll"); ?></h6>
    <div class="card-body">
        <!-- Cart Button's Settings-->
        <!-- Global Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Global", "catcbll"); ?></label>
                <label class="switch">
                    <input type="checkbox" class="class1" name="catcbll_cart_global" <?php checked($global, 'global'); ?> value="global" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Global End-->
        <!-- Shop Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("On Shop page", "catcbll"); ?></label>
                <label class="switch">
                    <input type="checkbox" class="class2" id="wcatcbll_cart_shop" name="catcbll_cart_shop" <?php checked($shop, 'shop'); ?> value="shop" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Shop End-->
        <!-- Single Product Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("On Single Product page", "catcbll"); ?></label>
                <label class="switch">
                    <input type="checkbox" class="class3" id="wcatcbll_cart_single_product" name="catcbll_cart_single_product" <?php checked($single, 'single-product'); ?> value="single-product" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Single Product End-->
        <!-- Open Link In New Tab Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html__("Open Link In New Tab", "catcbll"); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html__('If checkbox is checked, then custom button link will be opened in a new tab.', 'catcbll'); ?></span>
                    </div>
                </label>
                <label class="switch">
                    <input type="checkbox" class="class4" name="catcbll_btn_open_new_tab" <?php checked($btn_opnt, '1'); ?> value="1" />
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <!-- Open Link In New Tab End-->
    </div>
</div>