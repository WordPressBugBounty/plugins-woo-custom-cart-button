<div class="card p-0 w-100 mw-100">
    <div class="brdrbtm card-header d-flex justify-content-between align-items-center">
        <h6 id="democardLabel" class="card-title"><?php echo esc_html(__('Demo', 'catcbll')); ?></h6>
        <button type="button" class="btn btn-danger clear-selection"><?php echo esc_html(__('Clear Selection', 'catcbll')); ?></button>
    </div>
    <div class="card-body p-0">
        <div class="container-fluid catcbll_preview_button">
            <?php
            // Columns must be a factor of 12 (1, 2, 3, 4, 6, 12)
            $numOfCols = 3;
            $bootstrapColWidth = 12 / $numOfCols;
            ?>
            <div class="row my-2">
                <?php
                for ($i = 1; $i <= 24; $i++) {

                    $active = ($catcbll_ready_to_use == "crtubtn crtubtn{$i}") ? 'active' : '';
                ?>
                    <div class="col-md-<?php echo esc_attr($bootstrapColWidth); ?> pl-0">
                        <div class="p-3 border btn_card text-center <?php echo esc_attr($active); ?>">
                            <a href="JavaScript:void(0);" class="crtubtn crtubtn<?php echo esc_attr($i); ?>"><?php echo esc_html(__('Add To Cart', 'catcbll')); ?></a>
                        </div>
                    </div>
                <?php
                    if ($i % $numOfCols == 0) echo '</div><div class="row my-2">';
                }
                ?>
            </div>
        </div>
    </div>
</div>