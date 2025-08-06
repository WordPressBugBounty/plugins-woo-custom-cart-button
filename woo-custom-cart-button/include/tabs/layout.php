<div class="colbox m-0 p-0 card">
    <h6 class="brdrbtm card-header"><?php echo esc_html(__("Custom Button Style", "catcbll")); ?></h6>
    <div class="card-body">
        <!-- Cart Button's Settings-->
        <!-- Text Font Size Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Text Font Size", "catcbll")); ?></label>
                <div class="wcatcbll_range_slider">
                    <input class="wcatcbll_range_slider_range" id="catcbll_btn_fsize" type="range" value="<?php echo esc_attr($catcbll_btn_fsize); ?>" name="catcbll_btn_fsize" min="5" max="50">
                    <span class="wcatcbll_range_slider_value"><?php echo esc_html($catcbll_btn_fsize); ?></span>
                </div>
            </div>
        </div>
        <!-- Text Font Size End-->
        <!-- Border Size Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label">
                    <?php echo esc_html(__("Border Width", "catcbll")); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html__("The button border width will not work if ready to use designs are used", 'catcbll'); ?></span>
                    </div>
                </label>
                <div class="wcatcbll_range_slider">
                    <input class="wcatcbll_range_slider_range" id="catcbll_border_size" type="range" value="<?php echo esc_attr($catcbll_border_size); ?>" name="catcbll_border_size" min="0" max="20">
                    <span class="wcatcbll_range_slider_value" id="ccbtn_border_size"><?php echo esc_html($catcbll_border_size); ?></span>
                </div>
            </div>
        </div>
        <!-- Border Size End-->
        <!-- Border Radius Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Border Radius", "catcbll")); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html__("The button border radius will not work if ready to use designs are used", 'catcbll'); ?></span>
                    </div>
                </label>
                <div class="wcatcbll_range_slider">
                    <input class="wcatcbll_range_slider_range" id="catcbll_btn_radius" type="range" value="<?php echo esc_attr($catcbll_btn_radius); ?>" name="catcbll_btn_radius" min="1" max="50">
                    <span class="wcatcbll_range_slider_value" id="brdr_rds"><?php echo esc_html($catcbll_btn_radius); ?></span>
                </div>
            </div>
        </div>
        <!-- Border Radius End-->
        <!-- Button Background Start-->

        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Button Background", "catcbll")); ?></label>
                <input class="color-picker" data-alpha-enabled="true" type="text" name="catcbll_btn_bg" id="catcbll_btn_bg" value="<?php echo esc_attr($catcbll_btn_bg); ?>" />
            </div>
        </div>
        <!-- Button Background End-->
        <!-- Text Font Color Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Text Font Color", "catcbll")); ?></label>
                <input class="color-picker" id="catcbll_btn_fclr" data-alpha-enabled="true" type="text" name="catcbll_btn_fclr" value="<?php echo esc_attr($catcbll_btn_fclr); ?>" />
            </div>
        </div>
        <!-- Text Font Color End-->
        <!-- Border Color Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Border Color", "catcbll")); ?></label>
                <input class="color-picker" id="catcbll_btn_border_clr" data-alpha-enabled="true" type="text" name="catcbll_btn_border_clr" value="<?php echo esc_attr($catcbll_btn_border_clr); ?>" />
            </div>
        </div>
        <!-- Border Color End-->
        <!-- Hover Color Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Hover Color", "catcbll")); ?></label>
                <input class="color-picker" id="catcbll_btn_hvrclr" data-alpha-enabled="true" type="text" name="catcbll_btn_hvrclr" value="<?php echo esc_attr($catcbll_btn_hvrclr); ?>" />
            </div>
        </div>
        <!-- Hover Color End-->
        <!-- Button padding Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Button Padding", "catcbll")); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html(__('Button Padding', 'catcbll')); ?></span>
                    </div>
                </label>
                <ul class="btnpd_st">
                    <li>
                        <input type="number" name="catcbll_padding_top_bottom" id="catcbll_padding_top_bottom" placeholder="0" value="<?php echo esc_attr($catcbll_padding_top_bottom); ?>" class="btn_pv">
                        <label><?php echo esc_html(__("Vertically", "catcbll")); ?></label>
                    </li>
                    <li>
                        <input type="number" name="catcbll_padding_left_right" id="catcbll_padding_left_right" placeholder="0" value="<?php echo esc_attr($catcbll_padding_left_right); ?>" class="btn_ph">
                        <label><?php echo esc_html(__("Horizontally", "catcbll")); ?></label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Button padding End-->
        <!-- Button Margin Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Button Margin", "catcbll")); ?>
                    <div class="wcatcblltooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="wcatcblltooltiptext"><?php echo esc_html(__('Button Margin', 'catcbll')); ?></span>
                    </div>
                </label>
                <ul class="btnpd_st btnmd_st p-0">
                    <li>
                        <input type="number" name="catcbll_margin_top" value="<?php echo esc_attr($catcbll_margin_top); ?>" class="btn_mt">
                        <label><?php echo esc_html(__("Top", "catcbll")); ?></label>
                    </li>
                    <li>
                        <input type="number" name="catcbll_margin_right" value="<?php echo esc_attr($catcbll_margin_right); ?>" class="btn_mr">
                        <label><?php echo esc_html(__("Right", "catcbll")); ?></label>
                    </li>
                    <li>
                        <input type="number" name="catcbll_margin_bottom" value="<?php echo esc_attr($catcbll_margin_bottom); ?>" class="btn_mb">
                        <label><?php echo esc_html(__("Bottom", "catcbll")); ?></label>
                    </li>
                    <li>
                        <input type="number" name="catcbll_margin_left" value="<?php echo esc_attr($catcbll_margin_left); ?>" class="btn_ml">
                        <label><?php echo esc_html(__("Left", "catcbll")); ?></label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Button Margin End-->
        <!-- Button Icon Start-->
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <label class="form-check-label"><?php echo esc_html(__("Button Icon", "catcbll")); ?></label>
                <select name="catcbll_btn_icon_cls" id="wcatcll_font_icon">
                    <?php foreach ($wcatcbll_icons as $wcatcbll_key => $wcatcbll_val) { ?>
                        <option <?php selected($catcbll_btn_icon_cls, $wcatcbll_key); ?> value="<?php echo esc_attr($wcatcbll_key); ?>"><?php echo esc_html($wcatcbll_val); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- Button Icon End-->
    </div>
</div>