<?php

if (!defined('ABSPATH')) {
	exit;
}
if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] == 'hwx-wccb' && !isset($_GET['action'])) {
	include(WCATCBLL_CART_INC . 'admin/wcatcbll_welcome.php');
} elseif (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] == 'hwx-wccb' && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'settings') {
	include(WCATCBLL_CART_INC . 'admin/wcatcbll_main_settings.php');
} elseif (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] == 'hwx-wccb' && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'freevspaid') {
	include(WCATCBLL_CART_INC . 'admin/wcatcbll_freevspaid.php');
}