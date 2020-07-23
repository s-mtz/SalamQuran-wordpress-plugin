<?php
add_action('admin_menu', 'SalamQuran_admin_menu');

function SalamQuran_admin_menu()
{
    $main = add_menu_page(
        __('SALAM_QURAN', 'SalamQuran-wp'), // page title
        __('SALAM_QURAN', 'SalamQuran-wp'), // menue title
        'manage_options',                   // capability
        'SalamQuran_dashboard',             // menu slug
        'SalamQuran_dashboard_page',        // callable function
        SALAM_QURAN_IMG_URL . "logo.svg"    // icon url
    );

    $main_sub = add_submenu_page(
        'SalamQuran_dashboard',
        __('SALAM_QURAN', 'SalamQuran-wp'),
        __('SALAM_QURAN', 'SalamQuran-wp'),
        'manage_options',
        'SalamQuran_dashboard'
    );
}

function SalamQuran_dashboard_page()
{
    require SALAM_QURAN_TPL_DIR . 'html-admin-main.php';
}
