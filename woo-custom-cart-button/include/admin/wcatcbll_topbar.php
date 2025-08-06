<section class="navmenu">
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark position-relative">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://plugins.hirewebxperts.com/" target="_blank"><img src="<?php echo WCATCBLL_CART_IMG; ?>custom-add-to-cart-button.png" alt="Logo" width="140" class="d-inline-block align-text-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (!isset($_GET['action'])) ? 'active' : ''; ?>" href="?page=hwx-wccb"><?php echo __('Welcome', 'catcbll'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'settings') ? 'active' : ''; ?>" href="?page=hwx-wccb&action=settings"><?php echo __('Settings', 'catcbll'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'freevspaid') ? 'active' : ''; ?>" href="?page=hwx-wccb&action=freevspaid"><?php echo __('Free vs Paid', 'catcbll'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://wordpress.org/support/plugin/woo-custom-cart-button/reviews/#new-post" target="_blank"><?php echo __('Review', 'catcbll'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link glowing glowing1" href="https://plugins.hirewebxperts.com/custom-add-to-cart-button-and-link-pro/#ctbtnprice" target="_blank"><?php echo __('GET PRO', 'catcbll'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-text hide_mobile" id="supportnav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="https://wordpress.org/plugins/woo-custom-cart-button/" class="nav-link pe-0" target="_blank"><?php echo __('Knowledge Base', 'catcbll'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><?php echo WCATCBLL_VERSION; ?> <span class="badge text-bg-success text-white">CORE</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://plugins.hirewebxperts.com/free-support#catcbll" class="nav-link" target="_blank"><i class="fa-solid fa-headset"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>