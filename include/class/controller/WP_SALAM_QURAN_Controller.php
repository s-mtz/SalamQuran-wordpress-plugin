<?php

use Automattic\WooCommerce\Blocks\Assets\Api;

include SALAM_QURAN_INC_DIR_CTRL . "WP_SALAM_QURAN_Widget.php";
include SALAM_QURAN_INC_DIR . "class/Model/WP_SALAM_QURAN_Api.php";


class WP_SALAM_QURAN_Controller
{
    private $api;

    public function __construct()
    {
        $this->api = new WP_SALAM_QURAN_Api();

        add_shortcode('aye_rooz', [$this, 'day_aye']);
        add_shortcode('aye_rand', [$this, 'rand_aye']);

        add_action('widgets_init', [$this, 'register_salam_quran']);
        // $this->view = new WP_SALAM_QURAN_View();
    }

    function register_salam_quran()
    {
        register_widget('Salam_Quran_Widget');
    }

    public function day_aye()
    {
        $data = $this->api->day_aye();
        return $data;
    }

    public function rand_aye()
    {
        return $this->api->rand_aye();
    }
}
