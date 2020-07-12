<?php

include SALAM_QURAN_INC_DIR . "class/model/WP_SALAM_QURAN_Model.php";
include SALAM_QURAN_INC_DIR . "class/view/WP_SALAM_QURAN_View.php";

class WP_SALAM_QURAN_Controller
{
    private $model;
    private $view;
    public function __construct()
    {
        $this->model = new WP_SALAM_QURAN_Model();
        $this->view = new WP_SALAM_QURAN_View();
    }

    public function test()
    {

        $this->view->test("Test");
    }
}
